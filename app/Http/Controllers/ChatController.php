<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'question' => ['required', 'string', 'min:1'],
            'history' => ['nullable', 'array'],
        ]);

        $question = trim($data['question']);
        $history = $data['history'] ?? [];

        $answer = $this->generateAnswer($question, $history);

        return response()->json([
            'answer' => $answer,
        ]);
    }

    protected function generateAnswer(string $question, array $history): string
    {
        $normalizedQuestion = strtolower($question);

        if (str_contains($normalizedQuestion, 'fitsit') || str_contains($normalizedQuestion, 'fit sit')) {
            return 'FitSit is our fitness-focused platform that helps users discover products, track orders, and get support for their wellness journey.';
        }

        $apiKey = env('OPENAI_API_KEY');

        if (! empty($apiKey)) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ])->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-4o-mini',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a helpful assistant for the FitSit store. Answer briefly and clearly.',
                        ],
                        ...$this->formatHistory($history),
                        [
                            'role' => 'user',
                            'content' => $question,
                        ],
                    ],
                ]);

                if ($response->successful()) {
                    $content = data_get($response->json(), 'choices.0.message.content');

                    if (! empty($content)) {
                        return trim($content);
                    }
                }
            } catch (\Throwable $e) {
                // Fall back to the default response below.
            }
        }

        return 'I can help with products, orders, delivery, and general questions about FitSit. What would you like to know?';
    }

    protected function formatHistory(array $history): array
    {
        $messages = [];

        foreach ($history as $entry) {
            if (! is_array($entry)) {
                continue;
            }

            if (! empty($entry['role']) && ! empty($entry['content'])) {
                $messages[] = [
                    'role' => $entry['role'],
                    'content' => $entry['content'],
                ];
            }
        }

        return $messages;
    }
}
