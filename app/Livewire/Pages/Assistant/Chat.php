<?php

namespace App\Livewire\Pages\Assistant;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Validator;



#[Layout('layouts.app')]
class Chat extends Component
{

    public ?string $userInput; // Pour stocker l'entrée de l'utilisateur
    public ?string $response; // Pour stocker la réponse de l'API
    public $painIntensity;
    public ?string $painDuration;

    protected $openAIService;
    const MESSAGE_ERROR = 'Veuillez entrer un message valide.';

    public function __construct()
    {
        $this->openAIService = app(OpenAIService::class); // Injection de dépendance
    }

    protected function getInitialMessages(): array
    {
        return [
            ['role' => 'system', 'content' => 'tu es un assistant medical , capable de donner de Diagnostic sur base de plainte, symptome et de la duree.'],
            ['role' => 'system', 'content' => 'Réponds de manière concise et précise. Utilise un langage simple et clair et proposition.'],
            ['role' => 'system', 'content' => ' recommende toujours de voir un medecin physique apres chaque.'],
            ['role' => 'system', 'content' => ' continue la conversation en demandant plus d information pour une bonne conclusion.'],
        ];
    }

    public function sendMessage()
    {
        $validator = Validator::make(['userInput' => $this->userInput], [
            'userInput' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            $this->response = self::MESSAGE_ERROR;
            return;
        }

        $messages = array_merge($this->getInitialMessages(), [
            [
                'role' => 'user',
                'content' => "Symptome: {$this->userInput}\nDurée des symptômes : {$this->painDuration}\nIntensité de la douleur : {$this->painIntensity}"
            ],

        ]);

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
        return view('livewire.pages.assistant.chat');
    }
}
