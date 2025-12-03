<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Promotion;
use App\Repositories\ChatBoxAiRepository;


class ChatBoxAiService
{
    protected $chatBoxAiRepository;

    public function __construct(ChatBoxAiRepository $chatBoxAiRepository)
    {
        $this->chatBoxAiRepository = $chatBoxAiRepository;
    }

    public function chatWithAI($message)
    {
        $imageUrl = null;
        $context = "";
        $product = null;
        $productItem = null;

        // Tách từ khóa để tìm tên sản phẩm
        $keywords = explode(' ', strtolower($message));

        // --- 1. TÌM BIẾN THỂ SẢN PHẨM THEO TÊN HOẶC GIÁ ---
        $productItem = ProductItem::with(['variationOptions.variation', 'product'])
            ->whereHas('product', function ($q) use ($keywords) {
                foreach ($keywords as $word) {
                    $q->orWhereRaw('LOWER(product_name) LIKE ?', ["%$word%"]);
                }
            })
            ->orWhere(function ($q) use ($message) {
                if (preg_match('/\d+/', $message, $matches)) {
                    $q->where('price', $matches[0]);
                }
            })
            ->first();

        // --- 2. NẾU KHÔNG TÌM ĐƯỢC VARIATION → TÌM PRODUCT ---
        if (!$productItem) {
            $product = Product::with('category')
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $word) {
                        $query->orWhereRaw('LOWER(product_name) LIKE ?', ["%$word%"]);
                    }
                })
                ->first();
        }

        // --- 3. GHÉP CONTEXT VÀ LẤY ẢNH ---
        if ($productItem) {
            $imageUrl = $productItem->image
                ? asset($productItem->image)
                : ($productItem->product->image ? asset($productItem->product->image) : null);

            $variationsText = "";
            foreach ($productItem->variationOptions as $opt) {
                $variationsText .= "- {$opt->variation->name}: {$opt->value}\n";
            }

            $context = "Thông tin biến thể sản phẩm:\n";
            $context .= "- ID sản phẩm: {$productItem->product_item_id}\n";
            $context .= "- Tên sản phẩm: {$productItem->product->product_name}\n";
            $context .= "- Giá: {$productItem->price}\n";
            $context .= "- Tồn kho: {$productItem->qty_in_stock}\n";
            $context .= "- Thuộc tính:\n{$variationsText}";
            $context .= "- Ảnh: {$imageUrl}\n";
        } elseif ($product) {
            $imageUrl = $product->image ? asset($product->image) : null;

            $context = "Thông tin sản phẩm:\n";
            $context .= "- Tên: {$product->product_name}\n";

            $context .= "- Mô tả: {$product->description}\n";
            $context .= "- Danh mục: " . ($product->category->category_name ?? "Không có") . "\n";
            $context .= "- Ảnh: {$imageUrl}\n";
        } else {
            $context = "Không tìm thấy sản phẩm phù hợp trong cơ sở dữ liệu.";
        }

        // --- 4. GỬI CONTEXT ĐẾN AI ---
        $result = $this->chatBoxAiRepository->sendWithContext(
            "Người dùng hỏi: " . $message . "\n\nDữ liệu trong database:\n" . $context . "\n\nHãy trả lời đúng theo dữ liệu trên, không được bịa.",
            $context
        );

        $reply = $result['choices'][0]['message']['content'] ?? "Xin lỗi, tôi không thể trả lời ngay bây giờ.";

        return [
            "reply" => $reply,
            "image" => $imageUrl
        ];
    }
}
