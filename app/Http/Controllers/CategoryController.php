<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::paginate(10);
            return view('categories.index', compact('categories'));
        } catch (Exception $e) {
            Log::error('Error fetching categories: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error fetching categories.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $validated['slug'] = \Str::slug($validated['name']);
            Category::create($validated);

            return redirect()->route('categories.index')
                ->with('flash.banner', 'Category created successfully.');
        } catch (QueryException $e) {
            Log::error('Database error while creating category: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error creating category. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while creating category: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ]);

            $category->update($validated);

            return redirect()->route('categories.index')
                ->with('flash.banner', 'Category updated successfully.');
        } catch (ModelNotFoundException $e) {
            Log::error('Category not found: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Category not found.');
        } catch (QueryException $e) {
            Log::error('Database error while updating category: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error updating category. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while updating category: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Category deleted successfully.');
        } catch (ModelNotFoundException $e) {
            Log::error('Category not found: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Category not found.');
        } catch (QueryException $e) {
            Log::error('Database error while deleting category: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error deleting category. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while deleting category: ' . $e->getMessage());
            return redirect()->route('categories.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }
}
