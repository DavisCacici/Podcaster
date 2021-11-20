<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Podcast;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestPodcast;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $file = Podcast::where('userid', $id)->get();
        return view("profile", compact('file', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $podcast = Podcast::where('id', $id)->get();
        // dd($podcast);
        return view('profileShow', compact('podcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Podcast::find($id);
        $user = Auth::id();
        // dd($user);
        $name = $request->input('name');
        $description = $request->input('description');

        if($name == null )
        {
            $update->update([
                'description' => $description,
            ]);
            return redirect("/profile/$user")->with('mess', 'aggiornamento riuscito');
        }
        elseif($description == null )
        {
            $update->update([
                'name' => $name,
            ]);
            return redirect("/profile/$user")->with('mess', 'aggiornamento riuscito');
        }
        else
        {
            $update->update([
                'name' => $name,
                'description' => $description,
            ]);
            return redirect("/profile/$user")->with('mess', 'aggiornamento riuscito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileid)
    {
        $podacst = Podcast::find($fileid);
        Storage::disk('public')->delete($podacst->path);
        $podacst->delete();
        $auth = Auth::id();
        return redirect("/profile/$auth")->with('destroy', 'distrutto');
    }

    function carica(RequestPodcast $request)
    {
        $user = Auth::id();
        $file = $request->file('file');
        // $origin = $file->getClientOriginalName();
        $descrizione = $request->input('description');
        $name = $request->input('name');
        Podcast::create([
            "name" => $name,
            "description" => $descrizione,
            'path' => Storage::disk('public')->put("/$user", $file),
            'ext' => $file->clientExtension(),
            'userid' => $user
        ]);
        return redirect("carica")->with('mess', "caricato con successo");
    }

    public function download(Request $request)
    {
        $path = $request->input('path');
        return Storage::disk('public')->download($path);
    }
}




