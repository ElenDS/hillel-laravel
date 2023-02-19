<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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

    public function processFormNewCategory(CategoryRequest $request)
    {
        $newCategory = new Category();
        $newCategory->name = $request->input('name');
        $newCategory->save();

        session()->flash('message', 'Category successfully created');

        return redirect('/list-categories');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect('/list-categories');
    }

    public function updateCategory(Category $category)
    {
        return view('pages.update-category', ['category' => $category]);
    }

    public function processFormUpdateCategory(CategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();

        session()->flash('message', 'Category successfully updated');

        return redirect('/list-categories');
    }
}
