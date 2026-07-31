<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChatControllerTest extends TestCase
{
    public function test_chat_endpoint_returns_json_answer(): void
    {
        $response = $this->postJson('/chat', [
            'question' => 'what is fitsit',
            'history' => [],
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'answer',
        ]);
        $this->assertNotEmpty($response->json('answer'));
    }
}
