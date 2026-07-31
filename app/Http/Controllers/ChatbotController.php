<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $baseUrl = env('CHATBOT_API_URL');

        try {
            // كود إرسال الطلب لـ API الـ AI
            $response = Http::timeout(30)->post("{$baseUrl}/chat", [
                'message' => $request->input('message'),
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json([
                'error' => 'حدث خطأ أثناء التواصل مع الـ AI'
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'تعذر الاتصال بسيرفر الـ AI',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}