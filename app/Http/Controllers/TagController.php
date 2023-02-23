<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('pages.list-tags', ['tags' => $tags]);
    }

    public function create()
    {
        return view('pages.create-tag');
    }

    public function store(TagRequest $request)
    {
        $newTag = new Tag();
        $newTag->name = $request->input('name');
        $newTag->save();

        session()->flash('message', 'Tag successfully created');

        return redirect('admin/tags');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('admin/tags');
    }

    public function edit(Tag $tag)
    {
        return view('pages.update-tag', ['tag' => $tag]);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->name = $request->input('name');
        $tag->save();

        session()->flash('message', 'Tag successfully updated');

        return redirect('admin/tags');
    }

}
