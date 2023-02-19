<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    public function showPosts()
    {
        $posts = Post::all();
        return view('pages.index', ['posts' => $posts]);
    }

    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.create-post', ['categories' => $categories, 'tags' => $tags]);
    }

    public function processFormNewPost(PostRequest $request)
    {
        $newPost = new Post();
        $newPost->title = $request->input('title');
        $newPost->text = $request->input('text');
        $newPost->category_id = $request->input('category_id');
        $newPost->save();
        $newPost->tags()->attach($request->input('tags'));

        session()->flash('message', 'Post successfully created');

        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function updatePost(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.update-post', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function processFormUpdatePost(PostRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->category_id = $request->input('category_id');
        $post->save();
        $post->tags()->detach();
        $post->tags()->attach($request->input('tags'));

        session()->flash('message', 'Post successfully updated');

        return redirect('/');
    }

}
