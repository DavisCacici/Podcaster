<div>
    {{-- In work, do what you enjoy. --}}
    <form action="" method="post" wire:click="submit">
        <label for="name">Nome</label>
        <input wire:model="name" type="text" id="name" name="name">
        <br>
        <label for="email">Email</label>
        <input wire:model="email" type="email" name="email" id="email">
        <br>
        <label for="password">Password</label>
        <input wire:model="password" type="password" name="password" id="password">
        <br>
        <label for="passwordConfirmation">Conferma Password</label>
        <input wire:model="passwordConfirmartiom" type="password" name="passwordConfirmation" id="passwordConfirmation">
        <br>
        <label for="role">Podcaster?</label>
        <input wire:model="role" type="checkbox" name="role" id="role">
        <br>
        <button type="submit">{{ __('Register') }}</button>
    </form>
</div>
