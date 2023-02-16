<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategories()
    {
        $categories = Category::all();
        return view('pages.list-categories', ['categories' => $categories]);
    }

    public function createCategory()
    {
        return view('pages.create-category');
    }

    public function processFormNewCategory(Request $request)
    {
        $newCategory = new Category();
        $newCategory->name = $request->input('name');
        $newCategory->save();
        return redirect('/list-categories');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/list-categories');
    }

    public function updateCategory($id)
    {
        $category = Category::find($id);
        return view('pages.update-category', ['category' => $category]);
    }

    public function processFormUpdateCategory(Request $request)
    {
        $category = Category::find($request->input('id'));
        $category->name = $request->input('name');
        $category->save();
        return redirect('/list-categories');
    }

}
