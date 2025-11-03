<?php
namespace App\Repositories;

use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;

class ShoppingCartRepository
{
    public function getCartByUserId($userId)
    {
        // Eager-load product inside productItem so callers can access product data without extra queries
        return ShoppingCart::with('items.productItem.product')->where('user_id', $userId)->first();
    }

    // Tạo giỏ hàng cho user nếu chưa có
    public function createCartForUser($userId)
    {
        return ShoppingCart::firstOrCreate(['user_id' => $userId]);
    }

    // Lấy cart item theo cart và product item
    public function getCartItem($cartId, $productItemId)
    {
        return ShoppingCartItem::where('shopping_cart_id', $cartId)
            ->where('product_item_id', $productItemId)
            ->first();
    }

    // Tạo mới cart item
    public function createCartItem($cartId, $productItemId, $quantity)
    {
        return ShoppingCartItem::create([
            'shopping_cart_id' => $cartId,
            'product_item_id' => $productItemId,
            'quantity' => $quantity
        ]);
    }

    // Cập nhật quantity
    public function updateCartItemQuantity(ShoppingCartItem $cartItem, $quantity)
    {
        $cartItem->quantity = $quantity;
        $cartItem->save();
        return $cartItem;
    }

    // Xóa cart item
    public function deleteCartItem(ShoppingCartItem $cartItem)
    {
        return $cartItem->delete();
    }
}
