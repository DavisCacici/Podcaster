<div>
    {{-- Stop trying to control. --}}
    <form {{--wire:submit.prevent='update'--}}>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" wire:model='name' name='name' class="form-control" id="recipient-name">

        </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">Descrizione:</label>
            <textarea class="form-control" wire:model='description' id="message-text" name='descrizione' ></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" wire:click='update' data-dismiss="modal">Salva</button>
        </div>
    </form>
</div>
