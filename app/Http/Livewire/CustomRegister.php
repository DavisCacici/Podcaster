<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CustomRegister extends Component
{
    public $email = '';
    public $name = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $role = false;

    public function submit()
    {
        $data = $this->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation',
            'passwordConfirmation' => 'required|same:password',
        ]);
        $roleid = $this->role ? 2 : 1;
        User::create([
            'name' => $this->name,
            'email' => $data['email'],
            'password'=> Hash::make($data['password']),
            'roleid' => $roleid,
        ]);
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.custom-register');
    }
}
