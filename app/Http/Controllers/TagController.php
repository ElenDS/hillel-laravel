<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listTags()
    {
        $tags = Tag::all();
        return view('pages.list-tags', ['tags' => $tags]);
    }

    public function createTag()
    {
        return view('pages.create-tag');
    }

    public function processFormNewTag(Request $request)
    {
        $newTag = new Tag();
        $newTag->name = $request->input('name');
        $newTag->save();
        return redirect('/list-tags');
    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/list-tags');
    }

    public function updateTag($id)
    {
        $tag = Tag::find($id);
        return view('pages.update-tag', ['tag' => $tag]);
    }

    public function processFormUpdateTag(Request $request)
    {
        $tag = Tag::find($request->input('id'));
        $tag->name = $request->input('name');
        $tag->save();
        return redirect('/list-tags');
    }

}
