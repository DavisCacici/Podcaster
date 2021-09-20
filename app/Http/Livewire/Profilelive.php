<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Profilelive extends Component
{

    public function render(Request $request)
    {
        $file = Podcast::where('userid', $request->id)->get();
        return view('livewire.profilelive', compact('file'));
    }
}
