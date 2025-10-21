<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Variation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $categories = Category::all();
        return response()->json(['success' => true, 'categories' => $categories], 200);
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Danh mục đã được tạo thành công.',
            'data' => $category
        ], 201);
    }


    /**
    * Display the specified resource.
    */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Lấy thông tin danh mục thành công.',
            'data' => $category
        ], 200);
    }



    /**
    * Update the specified resource in storage.
    */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật danh mục thành công.',
            'data' => $category
        ], 200);
    }


    /**
    * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa danh mục thành công',
            'deleted_id' => $id
        ]);
    }

    /**
    * Get varations by category
    */
    public function getVariationByCategory(Category $category)
    {
        $variations = $category->variations; 
        return response()->json([
            'category' => $category,
            'variations' => $variations,
        ]);
    }
}
