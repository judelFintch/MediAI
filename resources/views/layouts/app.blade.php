<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediAI - Assistant Médical Intelligent</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&q=80&w=50&h=50"
                    alt="MediAI Logo" class="logo-img">
                <span>MediAI</span>
            </div>
            <div class="nav-links">
                <a href="#" class="nav-link">Accueil</a>
                <a href="#" class="nav-link">Services</a>
                <a href="#" class="nav-link">Contact</a>
                <button class="btn btn-outline">Se connecter</button>
                <button class="btn btn-primary">S'inscrire</button>
            </div>
        </div>
    </nav>

    <body>
        <main>
            {{ $slot }}
        </main>


    </body>

</html>
