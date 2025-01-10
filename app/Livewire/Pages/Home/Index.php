<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\OpenAIService;

#[Layout('layouts.app')]
class Index extends Component
{
    public $userInput; // Pour stocker l'entrée de l'utilisateur
    public $response; // Pour stocker la réponse de l'API

    public $intialMessages; //

    protected $openAIService;

    public function __construct()
    {
        $this->openAIService = app(OpenAIService::class); // Injection de dépendance
    }

    public function sendMessage()
    {
        if (empty($this->userInput)) {
            $this->response = 'Veuillez entrer un message.';
            return;
        }

        $messages = [
            ['role' => 'system', 'content' => 'je veux que tu soit un assistant medical et reponds poliment et si tu as une question autre que medical ne repond pas.'],
            ['role' => 'system', 'content' => 'Réponds de manière concise et précise. Utilise un langage simple et clair.'],
            ['role' => 'system', 'content' => 'Réponds de manière concise et précise. Utilise un langage simple et clair.'],
            ['role' => 'system', 'content' => 'une fois le mot est medical verifie si il est un examen du laboratoire et si oui cherche la desciption, la valeur normale, et anormale.'],
            ['role' => 'user', 'content' => $this->userInput],
        ];

        try {
            $result = $this->openAIService->chat($messages);
            $this->response = $result['choices'][0]['message']['content'] ?? 'Aucune réponse reçue.';
        } catch (\Exception $e) {
            $this->response = 'Erreur : ' . $e->getMessage();
        }

        $this->userInput = ''; // Réinitialise l'entrée utilisateur
    }

    public function render()
    {
        return view('livewire.pages.home.index');
    }
}