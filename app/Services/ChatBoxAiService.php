<?php

namespace App\Services;

use App\Models\Product;
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
        $result = $this->chatBoxAiRepository->sendMessage($message);

        if (isset($result['choices'][0]['message']['content'])) {
            return $result['choices'][0]['message']['content'];
        }

        return "Xin lỗi, tôi không thể trả lời ngay bây giờ.";
    }
}
