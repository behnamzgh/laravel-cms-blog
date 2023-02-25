<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();
        $parentCategories = Category::where('category_id', null)->get();
        // \dd($parentCategories);
        return \view('panel.categories.index', \compact('categories', 'parentCategories'));
    }

    public function store(Request $request)
    {
        // 1.validate
        $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', 'unique:categories'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        // 2.save
        Category::create(
            $request->only(['name', 'slug', 'category_id'])
        );

        // 3.session
        \session()->flash('status', 'دسته بندی ذخیره شد');

        // 4.return
        return \back();
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
