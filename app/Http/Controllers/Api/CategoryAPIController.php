<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'All Categories',
            'data' => Category::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|string|max:255',
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $category = new Category([
                'name' => $request->name,
                'slug' => \Str::slug($request['name'])
            ]);

            if ($category->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Category created successfully',
                    'data' => $category
                ], 201);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                return response()->json([
                    'status' => true,
                    'message' => 'Category found',
                    'data' => $category
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|string|max:255',
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $category = Category::find($id);

            if ($category) {
                $category->name = $request->name;
                $category->slug = \Str::slug($request['name']);

                if ($category->save()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Category updated successfully',
                        'data' => $category
                    ], 200);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                $category->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Category deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
