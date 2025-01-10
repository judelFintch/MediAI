<div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Votre Assistant Médical Intelligent</h1>
            <p>Obtenez des diagnostics précis et des recommandations personnalisées grâce à notre technologie d'IA
                avancée.</p>
            <button class="btn btn-primary btn-large" onclick="startDiagnostic()">
                Démarrer le Diagnostic
            </button>
        </div>
    </section>

    <!-- Diagnostic Modal -->
    <div id="diagnosticModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Formulaire de Diagnostic</h2>

            <div class="form-group">
                <label for="symptoms">Décrivez vos symptômes:</label>
                <textarea wire:model="userInput" id="symptoms" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Intensité de la douleur:</label>
                <div class="radio-group">
                    <label>
                        <input wire:model="painIntensity" type="radio" name="pain" value="1">
                        Légère
                    </label>
                    <label>
                        <input wire:model="painIntensity" type="radio" name="pain" value="2">
                        Modérée
                    </label>
                    <label>
                        <input wire:model="painIntensity" type="radio" name="pain" value="3">
                        Sévère
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Durée des symptômes:</label>
                <select wire:model="painDuration" id="duration" class="form-control" required>
                    <option value="">Sélectionnez une durée</option>
                    <option value="today">Aujourd'hui</option>
                    <option value="week">Cette semaine</option>
                    <option value="month">Ce mois</option>
                    <option value="longer">Plus longtemps</option>
                </select>
            </div>
            <button wire:click="sendMessage()" class="btn btn-primary">Analyser</button>

        </div>
    </div>


    <!-- Results Section -->
    <section id="diagnosticResults" class="features">
        <div class="features-grid">
            <h2>Résultats du Diagnostic</h2>
            <div class="result-card">
                <p id="diagnosticSummary">
                    <!-- Le résumé des résultats sera injecté ici -->
                    Veuillez remplir le formulaire pour obtenir vos résultats.
                </p>
                <div class="recommendations">
                    <h3>Recommandations</h3>
                    <ul id="recommendationsList">
                        <!-- Les recommandations générées par GPT-3 s'afficheront ici -->
                        {{ $response }}
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <!-- Features Section -->
    <section class="features">
        <h2>Nos Services</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🧠</div>
                <h3>Diagnostic Intelligent</h3>
                <p>Analyse précise de vos symptômes par notre IA médicale avancée.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3>Suivi Personnalisé</h3>
                <p>Suivez votre progression et recevez des recommandations adaptées.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏥</div>
                <h3>Connexion Professionnelle</h3>
                <p>Mise en relation avec des professionnels de santé qualifiés.</p>
            </div>
        </div>
    </section>
</div>
