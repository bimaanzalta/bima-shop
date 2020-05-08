<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(10);

        $filterKeyword = $request->get('name');

        if ($filterKeyword) {
            $categories = Category::where('name', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');

        $new_category = new Category;
        $new_category->name = $name;

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('category_images', 'public');

            $new_category->image = $image_path;
        }

        $new_category->created_by = \Auth::user()->id;
        $new_category->slug = Str::slug($name, '-');
        $new_category->save();

        return redirect()->route('categories.create')->with('status', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $name = $request->get('name');
        $slug = $request->get('slug');

        $category->name = $name;
        $category->slug = $slug;

        if ($request->file('image')) {
            if ($category->image && file_exists(storage_path('app/public' . $category->image))) {
                \Storage::delete('public/' . $category->name);
            }
            $new_image = $request->file('image')->store('category_images', 'public');
            $category->image = $new_image;
        }

        $category->updated_by = \Auth::user()->id;
        $category->slug = Str::slug($name);
        $category->save();

        return redirect()->route('categories.edit', $category)->with('status', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('status', 'Category successfully moved to trash');
    }

    public function trash()
    {
        $deleted_category = Category::onlyTrashed()->paginate(10);
        return view('categories.index', ['categories' => $deleted_category]);
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->trashed()) {
            $category->restore();
        } else {
            return redirect()->route('categories.index')->with('status', 'Category is not in trash');
        }

        return redirect()->route('categories.index')->with('status', 'Category Successfully restored');
    }

    public function deletePermanent($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        if (!$category->trashed()) {
            return redirect()->route('categories.index')->with('status', 'Can not delete permanent active category');
        } else {
            $category->forceDelete();
            return redirect()->route('categories.index')->with('status', 'Category permanently deleted');
        }
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');

        $categories = Category::where('name', 'LIKE', "%$keyword%")->get();

        return $categories;
    }
}
