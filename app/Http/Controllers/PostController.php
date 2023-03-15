<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use TextAnalysis\Document;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags', 'image'])->get();
        return view('pages.list-posts', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.create-post', ['categories' => $categories, 'tags' => $tags]);
    }

    public function store(PostRequest $request)
    {
        $newPost = new Post();
        $newPost->title = $request->input('title');
        $newPost->text = $request->input('text');
        $newPost->user_id = $request->user()->id;
        $newPost->category_id = $request->input('category_id');
        $newPost->save();
        $newPost->tags()->attach($request->input('tags'));

        session()->flash('message', 'Post successfully created');

        return redirect('admin/posts');
    }

    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();
        return redirect('admin/posts');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $doc = new Document($post->text);
        $textLength = $doc->textLength();
        $wordNumber = $doc->wordsNumber();

        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.update-post', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'textLength' => $textLength,
            'wordNumber' => $wordNumber,
            ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->category_id = $request->input('category_id');
        $post->save();
        $post->tags()->sync($request->input('tags'));

        session()->flash('message', 'Post successfully updated');

        return redirect('admin/posts');
    }

}
