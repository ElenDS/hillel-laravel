<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        return view('pages.index');
    }

    public function listCategories()
    {
        $categories = Category::all();
        return view('pages.list-categories', ['categories' => $categories]);
    }

    public function createCategory()
    {
        return view('pages.create-category');
    }

    public function processFormNewCategory()
    {
        $newCategory = new Category();
        $newCategory->name = $_POST['name'];
        $newCategory->save();
        return redirect('/list-categories');
    }

    public function deleteCategory()
    {
        $category = Category::find($_GET['id']);
        $category->delete();
        return redirect('/list-categories');
    }

    public function updateCategory()
    {
        $category = Category::find($_GET['id']);
        return view('pages.update-category', ['category' => $category]);
    }

    public function processFormUpdateCategory()
    {
        $category = Category::find($_POST['id']);
        $category->name = $_POST['name'];
        $category->save();
        return redirect('/list-categories');
    }

    public function listTags()
    {
        $tags = Tag::all();
        return view('pages.list-tags', ['tags' => $tags]);
    }

    public function createTag()
    {
        return view('pages.create-tag');
    }

    public function processFormNewTag()
    {
        $newTag = new Tag();
        $newTag->name = $_POST['name'];
        $newTag->save();
        return redirect('/list-tags');
    }

    public function deleteTag()
    {
        $tag = Tag::find($_GET['id']);
        $tag->delete();
        return redirect('/list-tags');
    }

    public function updateTag()
    {
        $tag = Tag::find($_GET['id']);
        return view('pages.update-tag', ['tag' => $tag]);
    }

    public function processFormUpdateTag()
    {
        $tag = Tag::find($_POST['id']);
        $tag->name = $_POST['name'];
        $tag->save();
        return redirect('/list-tags');
    }

}
