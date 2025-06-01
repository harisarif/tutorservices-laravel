<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    //
    public function ask(Request $request)
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $request->message]
            ],
        ]);
    
        if (!$response->successful()) {
            return response()->json([
                'error' => true,
                'message' => 'OpenAI API error.',
                'details' => $response->json(),
            ], $response->status());
        }
    
        $data = $response->json();
    
        if (!isset($data['choices'][0]['message']['content'])) {
            return response()->json([
                'error' => true,
                'message' => 'Unexpected API response structure.',
                'raw' => $data,
            ]);
        }
    
        return response()->json([
            'message' => $data['choices'][0]['message']['content']
        ]);
    }
}
