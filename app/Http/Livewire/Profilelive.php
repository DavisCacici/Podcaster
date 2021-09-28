<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

class Profilelive extends Component
{
    public $name;
    public $descrizione;

    public function delete($id, $path)
    {
        $podacst = Podcast::find($id);
        $podacst->delete();
        Storage::disk('public')->delete($path);
        $auth = Auth::id();
        return redirect("profile/$auth");
    }


    public function render(Request $request)
    {
        $file = Podcast::where('userid', $request->id)->get();
        return view('livewire.profilelive', compact('file'));
    }
}
