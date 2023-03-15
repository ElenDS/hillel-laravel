<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::all();
        return view('pages.list-tags', ['tags' => $tags]);
    }

    public function create(): View
    {
        return view('pages.create-tag');
    }

    public function store(TagRequest $request): RedirectResponse
    {
        $newTag = new Tag();
        $newTag->name = $request->input('name');
        $newTag->save();

        session()->flash('message', 'Tag successfully created');

        return redirect('admin/tags');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect('admin/tags');
    }

    public function edit(Tag $tag): View
    {
        return view('pages.update-tag', ['tag' => $tag]);
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->name = $request->input('name');
        $tag->save();

        session()->flash('message', 'Tag successfully updated');

        return redirect('admin/tags');
    }

}
