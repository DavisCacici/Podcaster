<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    //

    function carica(Request $request)
    {
        // dd($request->all());
        $user = Auth::id();
        $file = $request->file('file');
        $descrizione = $request['descrizione'];
        $name = $request['name'];
        Podcast::create([
            "name" => $name,
            "description" => $descrizione,
            'path' => Storage::disk('public')->put("/$user", $file),
            'ext' => $file->getClientOriginalExtention(),
            'userid' => $user
        ]);

        return redirect("dashboard");
    }
}
