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
    public function index()
    {
        //
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
        $user = User::find($id);
        $file = Podcast::where('userid', $id)->get();
        $mess = "";
        return view("profile", compact('file', 'user', 'mess'));
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

        $update->update([
            'name' => $request->input('name'),
            'description' => $request->input("description"),
        ]);
        $user = Auth::id();
        return redirect("/profile/$user")->with('mess', 'aggiornamento riuscito');
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
        return redirect("/profile/$auth");
    }

    function carica(Request $request)
    {
        dd($request->file('pod'));
        $user = Auth::id();
        $file = $request->file('pod.file');
        $descrizione = $request->input('pod.description');
        $name = $request->input('pod.name');
        Podcast::create([
            "name" => $name,
            "description" => $descrizione,
            'path' => Storage::disk('public')->put("/$user", $file),
            'ext' => $file->clientExtension(),
            'userid' => $user
        ]);

        return redirect("carica");
    }
}




