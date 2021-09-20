<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{-- @dd($podcast) --}}

    @foreach ($file as $f)
    <h1>{{$f->name}}</h1>
    <audio controls>
    <source src="{{Storage::url($f->path)}}" type="audio/mp3">
    </audio>
    <p>{{$f->description}}</p>

    @endforeach





</div>
