@extends('layouts.app')

@section('content')
<!--Header of personal profile page-->
<div class="row">
    <div class="col-3 p-5">
        <img src="<?php echo $user->profile->profile_picture ?? 'https://www.sackettwaconia.com/wp-content/uploads/default-profile.png' ?>" class="rounded-circle" height=190px>
    </div>
    <div class="col-9 p-5">
        <div><h2>{{$user->profile->name}}</h2></div>
        @can('update', $user->profile)
        <a href="/profile/{{$user->id}}/edit">Edit profile</a>
        @endcan
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

@can('update', $user->profile)
    <div class="row d-flex justify-content-center">
        <!-- <a href="/instagram/update/{{$user->id}}">Update Instagram pictures</a> -->
        <insta-update></insta-update>
    </div>
    <div>
        <a href="{{route('pictures.create')}}">Add a new picture</a>
    </div>
@endcan
<!--Posts go here-->
<div class="row">
    <div class="col-3">
    @foreach($user->pictures as $picture)
        <a href="{{route('pictures.show', $picture->id )}}"><img src="{{$picture->filepath}}" width=250px></a>
    @endforeach
    </div>
</div>

@endsection
