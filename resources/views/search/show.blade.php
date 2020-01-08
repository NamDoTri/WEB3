@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($items as $user)
    <div>
        <img src="{{$user->profile->profile_picture ?? 'https://www.sackettwaconia.com/wp-content/uploads/default-profile.png'}}" width=70>
        <b><a href="/profile/{{$user->id}}">{{$user->name}}</a></b>    
    </div>
    @endforeach
</div>
@endsection
