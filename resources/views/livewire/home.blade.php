<div class="container">
 @foreach ($user as $u)
    <h3><a href="user/{{$u->id}}"><img src="{{Storage::url($u->profile_photo_path)}}" alt="{{$u->name}}" class="rounded-full h-20 w-20 object-cover"></a></h3><br>
 @endforeach
</div>
