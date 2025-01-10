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

    <!-- Diagnostic Form (Initially Hidden) -->
    <div id="diagnosticModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Formulaire de Diagnostic</h2>
            <form id="symptomForm" onsubmit="submitSymptoms(event)">
                <div class="form-group">
                    <label for="symptoms">Décrivez vos symptômes:</label>
                    <textarea id="symptoms" required></textarea>
                </div>
                <div class="form-group">
                    <label>Intensité de la douleur:</label>
                    <div class="radio-group">
                        <input type="radio" id="pain1" name="pain" value="1">
                        <label for="pain1">Légère</label>
                        <input type="radio" id="pain2" name="pain" value="2">
                        <label for="pain2">Modérée</label>
                        <input type="radio" id="pain3" name="pain" value="3">
                        <label for="pain3">Sévère</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="duration">Durée des symptômes:</label>
                    <select id="duration" required>
                        <option value="">Sélectionnez une durée</option>
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="longer">Plus longtemps</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Analyser</button>
            </form>
        </div>
    </div>

</div>
