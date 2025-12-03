<?php

namespace App\Http\Controllers;

use App\Services\ChatBoxAiService;
use Illuminate\Http\Request;

class ChatBoxAiController extends Controller
{
    //
    protected $chatBoxAiService;

    public function __construct(ChatBoxAiService $chatBoxAiService)
    {
        $this->chatBoxAiService = $chatBoxAiService;
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');
        $response = $this->chatBoxAiService->chatWithAI($message);

        return response()->json([
            'reply' => $response['reply'],
            'image' => $response['image']
        ]);
    }
}
