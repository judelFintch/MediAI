<div>
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl font-bold mb-4">Votre Assistant Médical Intelligent</h1>
            <p class="text-lg mb-6">
                Obtenez des diagnostics précis et des recommandations personnalisées grâce à notre technologie d'IA avancée.
            </p>
            <a href="{{ route('chat.assistant') }}"
                class="bg-white text-blue-600 font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-100 transition">
                Démarrer le Diagnostic
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Nos Services</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="text-4xl mb-4">🧠</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Diagnostic Intelligent</h3>
                    <p class="text-gray-600">Analyse précise de vos symptômes par notre IA médicale avancée.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="text-4xl mb-4">📋</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Suivi Personnalisé</h3>
                    <p class="text-gray-600">Suivez votre progression et recevez des recommandations adaptées.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="text-4xl mb-4">🏥</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Connexion Professionnelle</h3>
                    <p class="text-gray-600">Mise en relation avec des professionnels de santé qualifiés.</p>
                </div>
            </div>
        </div>
    </section>
</div>
