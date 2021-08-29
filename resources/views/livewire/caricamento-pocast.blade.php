<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h1>Benvenuto podcaster</h1>
    <h3>Qui potrai caricare le puntate del tuo podcast</h3>
    <form action="" method="post" wire:submit.prevent="handler">
        @csrf
        @method("POST")
        <label for="name">Nome</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="file">Carica il tuo episodio</label>
        <input type="file" name="file" id="file"/>
        <br>
        <div>
            <label for="descrizione">Descrivi brevemente o aggiungi dei link</label>
            <textarea name="descrizione" id="descrizione" cols="30" rows="10"></textarea>
        </div>

        <button type="submit">Carica</button>

    </form>
</div>
