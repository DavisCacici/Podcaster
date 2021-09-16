<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Profilelive extends Component
{

    public function render()
    {
        $file = Podcast::where('userid', Auth::id())->first();
        // dd($file);
        $podcast = Storage::url($file->path);
        // dd($podcast);
        return view('livewire.profilelive', compact('file', 'podcast'));
    }
}
