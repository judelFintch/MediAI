<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/chat/completions/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function chat(array $messages)
    {
        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-4o-mini', // ou 'gpt-3.5-turbo' selon votre choix
                'store' => true,
                'messages' => $messages,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
