<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.list-categories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('pages.create-category');
    }

    public function store(CategoryRequest $request)
    {
        $newCategory = new Category();
        $newCategory->name = $request->input('name');
        $newCategory->save();

        session()->flash('message', 'Category successfully created');

        return redirect('admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/categories');
    }

    public function edit(Category $category)
    {
        return view('pages.update-category', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();

        session()->flash('message', 'Category successfully updated');

        return redirect('admin/categories');
    }
}
