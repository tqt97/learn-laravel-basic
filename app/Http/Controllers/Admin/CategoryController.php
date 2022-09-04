<?php

namespace App\Http\Controllers\Admin;

use App\Components\CategoryRecursive;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{

    private $categoryRecursive;

    public function __construct(CategoryRecursive $categoryRecursive, Category $category)
    {
        $this->categoryRecursive = $categoryRecursive;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = $this->categoryRecursive->createCategory();

        return view('admin.category.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'status' => $request->status ? true : false,
            'parent_id' => $request->parent_id,
            'order_at' => $request->order_at
        ]);

        $category->storeFilePondMedia($request, $category, 'categories');

        return redirect()->route('admin.categories.index')->with('success', 'Add category successful !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $options = $this->categoryRecursive->editCategory($category->id, $category->parent_id);

        return view('admin.category.edit', compact('category', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'status' => $request->status ? true : false,
            'parent_id' => $request->parent_id,
            'order_at' => $request->order_at,
            'slug' => $request->slug
        ]);

        $category->updateFilePondMedia($request, $category, 'categories');

        return redirect()->route('admin.categories.index')->with('success', 'Edit category successful !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $category->clearMediaCollection('categories');

        return redirect()->route('admin.categories.index')->with('success', 'Delete category successful !');
    }
}
