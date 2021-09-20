<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $user = User::where('roleid','=','2')->get();
        // dd($user);
        return view('livewire.home', compact('user'));
    }
}
