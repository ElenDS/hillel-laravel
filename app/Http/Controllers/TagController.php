<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
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

    public function processFormNewTag(TagRequest $request)
    {
        $newTag = new Tag();
        $newTag->name = $request->input('name');
        $newTag->save();

        session()->flash('message', 'Tag successfully created');

        return redirect('/list-tags');
    }

    public function deleteTag(Tag $tag)
    {
        $tag->delete();
        return redirect('/list-tags');
    }

    public function updateTag(Tag $tag)
    {
        return view('pages.update-tag', ['tag' => $tag]);
    }

    public function processFormUpdateTag(TagRequest $request, Tag $tag)
    {
        $tag->name = $request->input('name');
        $tag->save();

        session()->flash('message', 'Tag successfully updated');

        return redirect('/list-tags');
    }

}
