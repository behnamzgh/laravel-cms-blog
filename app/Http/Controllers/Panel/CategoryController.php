<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\Category\CreateCategoryRequest;
use App\Http\Requests\Panel\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();
        $parentCategories = Category::where('category_id', null)->get();
        // \dd($parentCategories);
        return \view('panel.categories.index', \compact('categories', 'parentCategories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create(
            $request->validated()
        );

        \session()->flash('status', 'دسته بندی ذخیره شد');

        return \back();
    }

    public function edit(Category $category)
    {
        // inja migim az model category faghat onaii k category_id shon null hast yani parent hastan hamchenin
        // id sho barabar nist ba id on araye(category) k az form ersal shode va ba route model binding gereftim ro behemon bargardone
        $parentCategories = Category::where('category_id', null)->where('id', '!=', $category->id)->get();
        return \view('panel.categories.edit', \compact('category', 'parentCategories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update(
            $request->validated()
        );

        \session()->flash('status', 'دسته بندی به روز شد');

        return \redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        // ba estefade az route model binding tashkhis mide id k az taraf blade ersal shode va hamon category khas ro delete mikone
        $category->delete();
        \session()->flash('status', 'دسته بندی حذف شد');
        return \back();
    }
}
