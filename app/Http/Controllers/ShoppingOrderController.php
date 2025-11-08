<?php

namespace App\Http\Controllers;

use App\Models\ShoppingOrder;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Services\ShoppingOrderService;

class ShoppingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $shoppingOrderService;

    public function __construct(ShoppingOrderService $shoppingOrderService)
    {
        $this->shoppingOrderService = $shoppingOrderService;
    }
    public function index()
    {
        try {
            $shoppingOrder = $this->shoppingOrderService->getAllShoppingOrders();
            return response()->json($shoppingOrder, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show($id)
{
    try {
        $shoppingOrder = $this->shoppingOrderService->getShoppingOrderDetail($id);
        return response()->json($shoppingOrder, 200);
    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingOrder $shoppingOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShoppingOrder $shoppingOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingOrder $shoppingOrder)
    {
        //
    }
}
