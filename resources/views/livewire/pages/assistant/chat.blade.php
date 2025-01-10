<div class="flex h-screen bg-gray-50">
    <!-- Barre latérale -->
    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 z-30 w-64 bg-blue-700 text-white flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="p-4 font-bold text-lg border-b border-blue-500">Historique</div>
        <nav class="flex-1 overflow-y-auto p-4 space-y-2">
            <a href="#" class="block px-4 py-2 bg-blue-600 rounded hover:bg-blue-500 transition">Conversation 1</a>
            <a href="#" class="block px-4 py-2 bg-blue-600 rounded hover:bg-blue-500 transition">Conversation 2</a>
            <a href="#" class="block px-4 py-2 bg-blue-600 rounded hover:bg-blue-500 transition">Conversation 3</a>
        </nav>
        <div class="p-4 border-t border-blue-500">
            <button class="w-full bg-red-500 py-2 rounded-lg hover:bg-red-400 transition">
                Effacer l'historique
            </button>
        </div>
    </aside>

    <!-- Overlay pour mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

    <!-- Contenu principal -->
    <div class="flex-1 flex flex-col">
        <!-- Barre supérieure -->
        <header class="bg-white shadow p-4 border-b border-gray-200 flex items-center justify-between lg:hidden">
            <h2 class="text-xl font-semibold text-blue-700">Assistant Médical</h2>
            <button id="menuButton" class="text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </header>

        <!-- Zone des messages -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-100">
            <!-- Exemple de message utilisateur -->
            <div class="flex justify-end">
                <div class="max-w-lg w-full md:w-3/4 lg:w-2/3 bg-blue-500 text-white p-4 rounded-lg shadow">
                    Bonjour, je ressens une douleur.
                </div>
            </div>

            <!-- Exemple de message assistant -->
            <div class="flex justify-start">
                <div class="max-w-lg w-full md:w-3/4 lg:w-2/3 bg-white text-gray-800 p-4 rounded-lg shadow border border-gray-300">
                    Merci pour votre message. Pouvez-vous préciser vos symptômes ?
                </div>
            </div>

            <!-- Messages dynamiques -->
            @if ($conversationHistory && count($conversationHistory) > 0)
                @foreach ($conversationHistory as $message)
                    <div class="flex {{ $message['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
                        <div
                            class="max-w-full md:max-w-3/4 lg:max-w-2/3 {{ $message['role'] === 'user' ? 'bg-blue-500 text-white' : 'bg-white text-gray-800 border border-gray-300' }} p-4 rounded-lg shadow">
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

<script>
    const menuButton = document.getElementById('menuButton');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuButton.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>
