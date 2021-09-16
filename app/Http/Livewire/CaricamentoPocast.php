<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\Podcast;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Livewire\WithFileUploads;
class CaricamentoPocast extends Component
{
    use WithFileUploads;
    public $file;
    public $name = "";
    public $descrizione = "";
    public function handler()
    {
        $data = $this->validate([
            'file' => 'required',
            'name' => 'required',
            'descrizione' => 'required',
        ]);
    }
    public function render()
    {
        return view('livewire.caricamento-pocast');
    }
}
