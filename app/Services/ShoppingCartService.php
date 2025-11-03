<?php
namespace App\Services;

use App\Repositories\ShoppingCartRepository;

class ShoppingCartService
{
    protected $cartRepo;

    public function __construct(ShoppingCartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function addToCart($userId, $productItemId, $quantity = 1)
    {
        // 1. Lấy hoặc tạo giỏ hàng
        $cart = $this->cartRepo->createCartForUser($userId);

        // 2. Kiểm tra item đã có trong giỏ chưa
        $cartItem = $this->cartRepo->getCartItem($cart->shopping_cart_id, $productItemId);

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $quantity;
            $this->cartRepo->updateCartItemQuantity($cartItem, $newQuantity);
        } else {
            $this->cartRepo->createCartItem($cart->shopping_cart_id, $productItemId, $quantity);
        }

        return $cart;
    }

    public function getCart($userId)
    {
        $cart = $this->cartRepo->getCartByUserId($userId);
        if (!$cart)
            return [];

        return $cart->items->map(function ($item) {

            $productItem = $item->productItem;


            $productName = ($productItem && $productItem->product)
                ? $productItem->product->product_name
                : ($item->product_name ?? 'Tên SP');


            $variationOptions = [];
            if ($productItem && $productItem->variationOptions) {
                $variationOptions = $productItem->variationOptions->map(function ($option) {
                    return [
                        'variation_option_id' => $option->variation_option_id,
                        'variation_option_name' => $option->value,
                        'variation_id' => $option->variation_id,
                    ];
                });
            }

            return [
                'cart_item_id' => $item->shopping_cart_item_id,
                'product_item_id' => $item->product_item_id,
                'product_name' => $productName,
                'price' => $productItem->price ?? 0,
                'quantity' => $item->quantity,
                'image' => $productItem->image ?? null,
                'variation_options' => $variationOptions,
            ];
        });
    }

    // Cập nhật số lượng
    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = \App\Models\ShoppingCartItem::find($cartItemId);
        if (!$cartItem)
            return false;
        $this->cartRepo->updateCartItemQuantity($cartItem, $quantity);
        return true;
    }

    // Xóa cart item
    public function removeItem($cartItemId)
    {
        $cartItem = \App\Models\ShoppingCartItem::find($cartItemId);
        if (!$cartItem)
            return false;
        $this->cartRepo->deleteCartItem($cartItem);
        return true;
    }
}
