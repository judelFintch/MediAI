// Modal Management
function startDiagnostic() {
    const modal = document.getElementById('diagnosticModal');
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('diagnosticModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('diagnosticModal');
    if (event.target === modal) {
        closeModal();
    }
}

// Form Submission
function submitSymptoms(event) {
    event.preventDefault();
    
    const symptoms = document.getElementById('symptoms').value;
    const pain = document.querySelector('input[name="pain"]:checked')?.value;
    const duration = document.getElementById('duration').value;

    // Here you would typically send this data to your GPT-3 backend
    console.log('Diagnostic data:', { symptoms, pain, duration });

    // Mock response - In production, this would come from your AI backend
    showDiagnosticResults({
        diagnosis: "Basé sur vos symptômes, il pourrait s'agir d'une migraine.",
        recommendations: [
            "Repos dans un environnement calme et sombre",
            "Hydratation régulière",
            "Consultation médicale si les symptômes persistent"
        ],
        urgency: "moderate"
    });
}

function showDiagnosticResults(results) {
    // Create and show results modal
    const modalContent = document.querySelector('.modal-content');
    modalContent.innerHTML = `
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Résultats du Diagnostic</h2>
        <div class="diagnostic-results">
            <div class="result-section">
                <h3>Diagnostic Préliminaire</h3>
                <p>${results.diagnosis}</p>
            </div>
            <div class="result-section">
                <h3>Recommandations</h3>
                <ul>
                    ${results.recommendations.map(rec => `<li>${rec}</li>`).join('')}
                </ul>
            </div>
            <div class="result-section ${results.urgency}">
                <p class="urgency-note">
                    ${results.urgency === 'high' 
                        ? '⚠️ Consultez un médecin rapidement' 
                        : 'Surveillez vos symptômes et consultez si nécessaire'}
                </p>
            </div>
        </div>
        <button class="btn btn-primary" onclick="closeModal()">Fermer</button>
    `;
}

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


