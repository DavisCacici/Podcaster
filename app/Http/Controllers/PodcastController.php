<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class PodcastController extends Controller
{
    //

    function carica(Request $request)
    {
        $user = Auth::id();
        $file = $request->file('file');
        $descrizione = $request['descrizione'];
        $name = $request['name'];
        Podcast::create([
            "name" => $name,
            "description" => $descrizione,
            'path' => Storage::disk('public')->put("/$user", $file),
            'ext' => $file->clientExtension(),
            'userid' => $user
        ]);

        return redirect("dashboard");
    }

    function view($id)
    {
        return redirect("profile/$id");
    }

    function edit(Request $request, $id)
    {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect("profile/$id")
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }
        $update = Podcast::find($id);
        $update->update([
            'name' => $request->input('name'),
            'description' => $request->input("description"),
        ]);
        return redirect("profile/$id")->with('mess', 'aggiornamento riuscito');
    }
}
