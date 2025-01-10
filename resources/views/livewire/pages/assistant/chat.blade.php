<div>
    <div id="virtualAssistant" class="mt-8" style="margin-top: 9rem;">
        <div class="assistant-container"
            style="display: flex; flex-direction: column; max-width: 800px; margin: 0 auto; padding: 1.5rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; background: #edf2f7; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2
                style="text-align: center; margin-bottom: 1.5rem; color: #2d3748; font-family: Arial, sans-serif; font-size: 1.5rem;">
                Assistant Virtuel - Interaction
            </h2>

            <!-- Prompt History Section -->
            <div id="promptHistory"
                style="flex: 1; overflow-y: auto; padding: 1rem; border: 1px solid #cbd5e0; border-radius: 0.5rem; background: #fff; margin-bottom: 1.5rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); max-height: 300px;">
                <!-- Vérifier et afficher l'historique des messages -->
                @if ($conversationHistory && count($conversationHistory) > 0)
                    @foreach ($conversationHistory as $message)
                        <div style="margin-bottom: 1rem;">
                            <span
                                style="font-weight: bold; color: {{ $message['role'] === 'user' ? '#3182ce' : '#38a169' }};">
                                {{ $message['role'] === 'user' ? 'Utilisateur:' : 'Assistant:' }}
                            </span>
                            <span>{{ $message['content'] }}</span>
                        </div>
                    @endforeach
                @else
                    <div style="margin-bottom: 1rem; color: #718096; text-align: center;">
                        Aucun message pour le moment. Commencez la conversation !
                    </div>
                @endif
            </div>

            <!-- Input Section -->
            <div class="input-section" style="display: flex; gap: 0.5rem; align-items: flex-start;">
                <textarea wire:model="userInput" id="userPrompt" placeholder="Écrivez ici..."
                    style="flex: 1; padding: 0.75rem; border: 1px solid #cbd5e0; border-radius: 0.25rem; resize: none; font-family: Arial, sans-serif; font-size: 1rem; line-height: 1.5;"
                    rows="3"></textarea>
                <button wire:click="sendMessage" id="sendPromptButton"
                    style="padding: 0.75rem 1rem; background-color: #3182ce; color: white; border: none; border-radius: 0.25rem; cursor: pointer; font-family: Arial, sans-serif; font-size: 1rem; font-weight: bold;">
                    Envoyer
                </button>
            </div>
        </div>
    </div>
</div>
