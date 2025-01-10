<div>
    <h1>Chat avec GPT</h1>

    <div>
        <label for="userInput">Votre Message :</label>
        <input type="text" id="userInput" wire:model="userInput">
        <button wire:click="sendMessage">Envoyer</button>
    </div>

    @if($response)
        <div>
            <h3>Réponse :</h3>
            <p>{{ $response }}</p>
        </div>
    @endif
</div>
