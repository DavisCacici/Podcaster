<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{-- @dd($podcast) --}}
    
    @foreach ($podcast as $pod)
        <p>Il{{$pod->name}}</p>
        {{-- <source src="{{$pod->file}}"> --}}
    @endforeach
    
</div>
