<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Profilelive extends Component
{

    public function render()
    {
        $podcast = Podcast::where("userid", Auth::id());
        $podcast = (object)$podcast;
        var_dump($podcast);
        return view('livewire.profilelive', compact('podcast'));
    }
}
