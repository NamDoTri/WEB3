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
        <a href="/profile/{{$user->id}}/edit" class="">Edit profile</a>
        @endcan
        <div class="d-flex">
            <div class="pr-5"><strong>{{$user->pictures->count()}}</strong> posts</div>
            <div class="pr-5"><strong>{{$user->profile->followers}}</strong> followers</div>
            <div class="pr-5"><strong>{{$user->profile->following}}</strong> following</div>
        </div>
        <div class="pt-3">
            <b class="pr-3">Bio</b>{{$user->profile->description}}
        </div>
        <div>
            <b>Joined us on:</b> {{ date('F d, Y', strtotime($user->created_at)) }}
        </div>
    </div>
</div>

@can('update', $user->profile)
    <div class="row d-flex justify-content-center">
        <!-- <a href="/instagram/update/{{$user->id}}">Update Instagram pictures</a> -->
        <!-- <insta-update></insta-update> -->
    </div>
    @if ($user->role=='picture')
    <div>
        <a href="{{route('pictures.create')}}" class="pb-2 btn btn-primary">Add a new picture</a>
    </div>
    @endif
@endcan
<!--Posts go here-->
<div class="row pt-3">
    @if ($user->role =='picture')
        <div class="col-3 d-flex">
        @foreach($user->pictures as $picture)
            <a href="{{route('pictures.show', $picture->id )}}" class='p-2'><img src="{{$picture->filepath}}" width=250px></a>
        @endforeach
        </div>
    @else
    <div class="col-3">
        @foreach($user->critics as $critic)
            <a href="{{route('pictures.show', $critic->picture->id )}}"><img src="{{$critic->picture->filepath}}" width=250px></a>
        @endforeach
        </div>
    @endif
</div>

@endsection
