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
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [

            'model' => 'llama-3.1-8b-instant',
            'messages' => [
                ['role' => 'system', 'content' => 'Bạn là một trợ lý ảo hữu ích, luôn trả lời bằng tiếng Việt.'],
                ['role' => 'user', 'content' => $message],
            ],
        ]);

        \Log::info(' Groq response: ' . $response->body());

        //  Ghi log khi lỗi
        if ($response->failed()) {
            \Log::error(' Groq Error: ' . $response->body());
            return [
                'error' => true,
                'message' => $response->body()
            ];
        }

        return $response->json();
    }
}
