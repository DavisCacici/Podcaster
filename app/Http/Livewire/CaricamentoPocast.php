<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Podcast;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;

class CaricamentoPocast extends Component
{
    public function handler(Request $request, User $user)
    {
        $file = $request['file'];
        $descrizione = $request['descrizione'];
        $name = $request['name'];
        Podcast::create([
            "name" => $name,
            "descrizione" => $descrizione,
            'file' => $file,
            'userid' => $user->id
        ]);

        return redirect("dashboard");

    }
    public function render()
    {
        return view('livewire.caricamento-pocast');
    }
}
