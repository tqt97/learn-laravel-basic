<?php

namespace App\Http\Controllers\Admin;

use App\Components\CategoryRecursive;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
    public function index(Request $request)
    {
        $categories = Category::tree()
            ->withCount('children')
            ->when(
                $request->has('archive'),
                function ($query) {
                    $query->onlyTrashed();
                }
            )
            ->get()
            ->toTree();

        Session::put('back_url', url()->full());

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

        if (session('back_url')) {
            return redirect(session('back_url'));
        }
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

        if (session('back_url')) {
            return redirect(session('back_url'));
        }
        return redirect()->route('admin.categories.index')
            ->with('undo', '<span class="font-bold">' . $category->name . '</span> deleted! <a class="font-bold text-indigo-500 link-underline transition duration-150 ease-in-out" href="' . route('admin.categories.get.restore', $category->id) . '">Oops, Undo</a>');
    }
    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        if ($category && $category->trashed()) {
            $category->restore();
        }

        if (session('back_url')) {
            return redirect(session('back_url'));
        }
        return redirect()->route('admin.categories.index')->with('success', 'Category restore successful !');
    }
    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        $category->clearMediaCollection('categories');


        if (session('back_url')) {
            return redirect(session('back_url'));
        }
        return redirect()->route('admin.categories.index')->with('success', 'Category force delete successful !');
    }
}
