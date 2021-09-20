<div class="container">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h1>Benvenuto podcaster</h1><br>
    <h3>Qui potrai caricare le puntate del tuo podcast</h3><br>
    <form action="/carica" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <label for="name">Nome: </label>
        <input wire:model="name" type="text" id="name" name="name">
        @error('name')
            <small class="error">{{$message}}</small>
        @enderror
        <br>
        <label for="file">Carica il tuo episodio: </label>
        <input wire:model="file" type="file" name="file" id="file"/>
        @error('file')
            <small class="error">{{$message}}</small>
        @enderror
        <br>
        <label for="descrizione">Descrivi brevemente o aggiungi dei link:</label><br>
        <textarea wire:model="descrizione" name="descrizione" id="descrizione" cols="30" rows="10"></textarea>
        @error('descrizione')
            <small class="error">{{$message}}</small>
        @enderror
        <br><br>
        <button type="submit" class="btn btn-primary">  Carica  </button>

    </form>
</div>
