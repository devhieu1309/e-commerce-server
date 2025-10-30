<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ShoppingCartService;
use Illuminate\Http\Response;

class ShoppingCartController extends Controller
{
    protected $cartService;

    public function __construct(ShoppingCartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * GET /api/cart
     * Lấy toàn bộ giỏ hàng của user (truyền user_id qua query)
     * vd: /api/cart?user_id=1
     */
    public function index(Request $request)
    {
        $userId = $request->query('user_id');
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Missing user_id parameter'
            ], Response::HTTP_BAD_REQUEST);
        }

        $cart = $this->cartService->getCart($userId);

        return response()->json([
            'success' => true,
            'data' => $cart
        ], Response::HTTP_OK);
    }

    /**
     * POST /api/cart
     * Thêm sản phẩm vào giỏ hàng
     * body: { "user_id": 1, "product_item_id": 2, "quantity": 3 }
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'product_item_id' => 'required|exists:product_items,product_item_id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $cart = $this->cartService->addToCart(
            $validated['user_id'],
            $validated['product_item_id'],
            $validated['quantity'] ?? 1
        );

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart successfully',
            'data' => $cart
        ], Response::HTTP_CREATED);
    }

    /**
     * GET /api/cart/{id}
     * Lấy giỏ hàng theo user_id (giữ RESTful)
     */
    public function show($userId)
    {
        $cart = $this->cartService->getCart($userId);

        if (!$cart) {
            return response()->json([
                'success' => false,
                'message' => 'Cart not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $cart
        ], Response::HTTP_OK);
    }

    /**
     * PUT /api/cart/{cart_item_id}
     * Cập nhật số lượng item trong giỏ
     * body: { "quantity": 5 }
     */
    public function update(Request $request, $cartItemId)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $updated = $this->cartService->updateQuantity($cartItemId, $validated['quantity']);

        if (!$updated) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart item quantity updated successfully'
        ], Response::HTTP_OK);
    }

    /**
     * DELETE /api/cart/{cart_item_id}
     * Xóa 1 item khỏi giỏ
     */
    public function destroy($cartItemId)
    {
        $deleted = $this->cartService->removeItem($cartItemId);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart item removed successfully'
        ], Response::HTTP_OK);
    }
}
