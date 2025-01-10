<div class="flex h-screen bg-gray-50">
    <!-- Barre latérale -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-4 font-bold text-lg border-b border-gray-700">Historique</div>
        <nav class="flex-1 overflow-y-auto p-4 space-y-2">
            <a href="#" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600 transition">Conversation 1</a>
            <a href="#" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600 transition">Conversation 2</a>
            <a href="#" class="block px-4 py-2 bg-gray-700 rounded hover:bg-gray-600 transition">Conversation 3</a>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <button class="w-full bg-red-500 py-2 rounded-lg hover:bg-red-400 transition">
                Effacer l'historique
            </button>
        </div>
    </aside>

    <!-- Zone principale -->
    <div class="flex-1 flex flex-col">
        <!-- Messages -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-100">
            <!-- Exemple de message utilisateur -->
            <div class="flex justify-end">
                <div class="max-w-lg bg-blue-500 text-white p-4 rounded-lg shadow">
                    Bonjour, je voudrais un diagnostic rapide.
                </div>
            </div>

            <!-- Exemple de message assistant -->
            <div class="flex justify-start">
                <div class="max-w-lg bg-white text-gray-800 p-4 rounded-lg shadow border border-gray-300">
                    Bien sûr ! Pouvez-vous décrire vos symptômes ?
                </div>
            </div>

            <!-- Messages dynamiques -->
            @if ($conversationHistory && count($conversationHistory) > 0)
                @foreach ($conversationHistory as $message)
                    <div class="{{ $message['role'] === 'user' ? 'flex justify-end' : 'flex justify-start' }}">
                        <div
                            class="max-w-lg {{ $message['role'] === 'user' ? 'bg-blue-500 text-white' : 'bg-white text-gray-800 border border-gray-300' }} p-4 rounded-lg shadow">
                            {{ $message['content'] }}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-gray-500">Aucun message pour le moment. Commencez la conversation !</div>
            @endif
        </div>

        <!-- Zone de saisie -->
        <div class="bg-white p-4 border-t border-gray-200 sticky bottom-0">
            <div class="flex items-center space-x-4">
                <textarea wire:model="userInput" id="userPrompt" placeholder="Écrivez ici..."
                    class="flex-1 p-3 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring focus:ring-blue-300"
                    rows="1"></textarea>
                <button wire:click="sendMessage"
                    class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 transition">
                    Envoyer
                </button>
            </div>
        </div>
    </div>
</div>
