<?php

namespace App\Livewire\Pages\Assistant;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Validator;

#[Layout('layouts.guest')]
class Chat extends Component
{
    public ?string $userInput = null; // Pour stocker l'entrée de l'utilisateur
    public ?string $response = null; // Pour stocker la réponse de l'API
    public ?array $responseParts = [];
    public array $conversationHistory = []; // Historique de la conversation
    protected $openAIService;

    const MESSAGE_ERROR = 'Veuillez entrer un message valide.';

    public function __construct()
    {
        $this->openAIService = app(OpenAIService::class); // Injection de dépendance
    }

    protected function getInitialMessages(): array
    {
        return [
            ['role' => 'system', 'content' => 'tu es un assistant médical, capable de donner des diagnostics sur la base de plaintes, symptômes et durées.'],
            ['role' => 'system', 'content' => 'Réponds de manière concise et précise. Utilise un langage simple et clair.'],
            ['role' => 'system', 'content' => 'Recommande toujours de voir un médecin physique après chaque diagnostic.'],
            ['role' => 'system', 'content' => 'Suggère toujours un enregistrement avec des éléments réels comme l’identité et le pays pour de meilleurs résultats.'],
            ['role' => 'system', 'content' => 'Continue la conversation en demandant plus d’informations pour une bonne conclusion.'],
            ['role' => 'system', 'content' => 'tu es un model NLP et dans cet assistant tu es develloper par Judel Finch.'],
        ];
    }

    public function sendMessage()
    {
        // Validation de l'entrée utilisateur
        $validator = Validator::make(['userInput' => $this->userInput], [
            'userInput' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            $this->response = self::MESSAGE_ERROR;
            return;
        }

        // Construction des messages pour l'API
        $userMessage = [
            'role' => 'user',
            'content' => $this->userInput
        ];

        $messages = array_merge($this->getInitialMessages(), $this->conversationHistory, [$userMessage]);

        try {
            // Appel à l'API OpenAI
            $result = $this->openAIService->chat($messages);
            $this->response = $result['choices'][0]['message']['content'] ?? 'Aucune réponse reçue.';

            // Ajouter les messages à l'historique
            $this->conversationHistory[] = $userMessage; // Message utilisateur
            $this->conversationHistory[] = [
                'role' => 'assistant',
                'content' => $this->response // Réponse de l'assistant
            ];
        } catch (\Exception $e) {
            $this->response = 'Erreur : ' . $e->getMessage();
        }

        $this->userInput = ''; // Réinitialise l'entrée utilisateur
    }

    public function render()
    {
        return view('livewire.pages.assistant.chat', [
            'conversationHistory' => $this->conversationHistory
        ]);
    }
}
