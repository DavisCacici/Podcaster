<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Podcast;

class Modal extends Component
{
    public $file;
    // public $id;
    public $name;
    public $description;

    public function mount($file)
    {
        $this->file = $file;
        // dd($file);
    }
    public function update()
    {
        $update = Podcast::find($this->file->id);
        $update->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        session()->flash('message', 'elemento aggiornato');
    }
    public function render()
    {
        return view('livewire.modal');
    }
}
