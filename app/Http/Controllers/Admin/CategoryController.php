<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::with('subcategories');

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $subcategories = Subcategory::all();

        return view('admin.categories.create',compact('subcategories'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        $category->subcategories()->attach($request->input('subcategory_id'));

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $subcategories = Subcategory::all();
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category','subcategories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        $category->subcategories()->sync($request->input('subcategory_id'));

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
