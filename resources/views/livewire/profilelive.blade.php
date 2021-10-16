<div class="container" style="display: flex; flex-direction: column;">

    @foreach ($file as $f)
    <div class="row">
        <div class="col">
            <h1>{{$f->name}}</h1>
        </div>
        <div class="col" style="margin-left: 80%; margin-top: 2%">
            <div class="row">
                @if($f->userid == Auth::id())
                <button type="submit" wire:click="delete('{{$f->id}}', '{{$f->path}}')">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
                </button>

               <!-- Button trigger modal -->
                <button type="button" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/></svg>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            {{-- @livewire('modal', ['file' => $f]) --}}
                            <form action="" method="PUT">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nome:</label>
                                    <input type="text" name='name' class="form-control" id="recipient-name">

                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Descrizione:</label>
                                    <textarea class="form-control" id="message-text" name='descrizione' ></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Salva</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
        <audio controls>
        <source src="{{Storage::url($f->path)}}" type="audio/mp3">
        </audio>
        <p>{{$f->description}}</p>
    @endforeach
</div>

