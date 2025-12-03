<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use Log;

class ChatBoxAiRepository
{

    protected $apiUrl = "https://api.groq.com/openai/v1/chat/completions";
    // protected $apiUrl = "https://api.openai.com/v1/chat/completions";
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GROQ_API_KEY');
    }

    public function sendMessage($message)
    {
        return $this->sendWithContext($message, "");
    }

    // Hàm mới: gửi message + context sản phẩm
    public function sendWithContext($message, $context)
    {
        $systemPrompt = "
            Bạn là trợ lý tư vấn sản phẩm điện thoại.
            Trả lời dựa trên dữ liệu sau. Nếu thiếu thông tin, phải trả lời:
            'Dạ shop hiện chưa có thông tin sản phẩm này ạ.'
            
            DỮ LIỆU SẢN PHẨM:
            $context

            Luôn trả lời bằng tiếng Việt, giọng tư vấn thân thiện.
        ";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [

            'model' => 'llama-3.1-8b-instant',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $message],
            ],
        ]);

        \Log::info('Groq Response:', [$response->body()]);

        if ($response->failed()) {
            \Log::error('Groq Error:', [$response->body()]);
            return ['error' => true, 'message' => 'API error'];
        }

        return $response->json();
    }
}
