<x-app-layout>
    <div class="container" style="display: flex; flex-wrap: wrap;">
        @foreach ($user as $u)
        <div style="margin-right: 5%;  margin-top: 5%; margin-bottom: 5%;width: 20%; height: auto;" >
           <div class="row">
               <div class="col">
                   <a href="profile/{{$u->id}}"><img src="{{Storage::url($u->profile_photo_path)}}" alt="{{$u->name}}"></a>
               </div>
               <div class="col">
                   <div class="row">
                       <h5>{{$u->name}}</h5>
                   </div>
                   <div class="row">
                       <p>descrizione</p>
                   </div>
               </div>
           </div>


        </div>

        @endforeach
</x-app-layout>
