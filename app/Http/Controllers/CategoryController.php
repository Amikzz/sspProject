<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::paginate(10),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = \Str::slug($validated['name']);
        Category::create($validated);
        return redirect()->route('categories.index')
            ->with('flash.banner', 'Category created successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')
            ->with('flash.banner', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->route('categories.index')
            ->with('flash.banner', 'Category deleted successfully.');
    }
}
