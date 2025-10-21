<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variations = Variation::all();
        return response()->json(['success' => true, 'variations' => $variations], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVariationRequest $request)
    {
        $validated = $request->validated();
        $variation = Variation::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Biến thể đã được tạo thành công.',
            'variation' => $variation
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariationRequest $request, $id)
    {
        $variation = Variation::findOrFail($id);

        $variation->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật biến thể thành công.',
            'data' => $variation
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $variation = Variation::findOrFail($id);
        $variation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa danh biến thể thành công.',
            'deleted_id' => $id
        ]);
    }

    /**
     * Get variations by variation name
     */
    public function searchByVariationName(Request $request)
    {
        // return "Minh Hieu";
        $name = $request->query('name');

        if (!$name) {
            return response()->json(['message' => 'Variation name is required for search.'], 400);
        }

        $variations = Variation::where('variation_name', 'LIKE', '%' . $name . '%')->get();

        if ($variations->isEmpty()) {
            return response()->json(['message' => 'No products found matching the name.'], 404);
        }

        return response()->json($variations);
    }
}
