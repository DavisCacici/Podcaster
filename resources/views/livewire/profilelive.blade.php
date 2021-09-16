<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{-- @dd($podcast) --}}

    <p>{{$file->name}}</p>
    <audio controls>
    <source src="{{$podcast}}" type="audio/mp3">
    </audio>
    <p>{{$file->description}}</p>
    {{-- @foreach ($podcast as $pod)
        <p>Il{{$pod->name}}</p>


    @endforeach --}}

</div>
