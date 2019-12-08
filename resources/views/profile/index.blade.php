@extends('layouts.app')

@section('content')
<!--Header of personal profile page-->
<div class="row">
    <div class="col-3 p-5">
        <img src="<?php echo $user->profile->profile_picture ?>" class="rounded-circle" height=190px>
    </div>
    <div class="col-9 p-5">
        <div><h2>{{$user->profile->name}}</h2></div>
        @auth
        <a href="/profile/{{$user->id}}/edit">Edit profile</a>
        @endauth
        <div class="d-flex">
            <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
            <div class="pr-5"><strong>{{$user->profile->followers}}</strong> followers</div>
            <div class="pr-5"><strong>{{$user->profile->following}}</strong> following</div>
        </div>
        <div>
            {{$user->profile->description}}
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <a href="/instagram/update/{{$user->id}}">Update Instagram pictures</a>
</div>
<!--Posts go here-->
<div class="row">
    <div class="col-3">
    @foreach($user->posts as $post)
        <a href="/p/{{$post->id}}"><img src="{{$post->host_link}}" width=250px></a>
    @endforeach
    </div>
</div>
@endsection
