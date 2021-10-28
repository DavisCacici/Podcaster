<x-app-layout>

<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @livewireStyles
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    {{-- @livewire('navigation-menu') --}}
    <div class="container">
        @if(session('mess'))
        <div class="alert alert-success" role="alert">
            {{session('mess')}}
        </div>
        @endif
        {{-- Care about people's approval and you will be their prisoner. --}}
        <h1>Benvenuto podcaster</h1><br>
        <h3>Qui potrai caricare le puntate del tuo podcast</h3><br>
        <form action="/carica" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name')}}</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Carica il tuo episodio</label>
                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" aria-describedby="fileError">
                <small id='fileError' class="form-text text-muted">{{ $errors->first('file') }}</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrivi o aggiungi dei link</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" aria-describedby="textError"></textarea>
                <small id="textError" class="form-text text-muted">{{$errors->first('description')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">  Carica  </button>

        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
</x-app-layout>




