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
        $user = User::find($id);
        $file = Podcast::where('userid', $id)->get();
        return view("profile", compact('file', 'user'));
    }

    function edit(Request $request, $id)
    {
        $update = Podcast::find($id);
        $update->update([
            'name' => $request->input('name'),
            'description' => $request->input("description"),
        ]);
        return redirect("/profile/$id")->with('mess', 'aggiornamento riuscito');
    }

    function delete($id, $path)
    {
        $podacst = Podcast::find($id);
        $podacst->delete();
        Storage::disk('public')->delete($path);
        $auth = Auth::id();
        return redirect("/profile/$auth");
    }
}
