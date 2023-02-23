<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
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
        $newPost->category_id = $request->input('category_id');
        $newPost->save();
        $newPost->tags()->attach($request->input('tags'));

        session()->flash('message', 'Post successfully created');

        return redirect('admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('admin/posts');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.update-post', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->category_id = $request->input('category_id');
        $post->save();
        $post->tags()->detach();
        $post->tags()->attach($request->input('tags'));

        session()->flash('message', 'Post successfully updated');

        return redirect('admin/posts');
    }

}
