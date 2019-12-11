@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <span> <b>{{$picture->user->profile->name}}</b> {{$picture->caption}}</span>
        <span>{{$picture->likes}} likes</span>
    </div>
    <img src="{{$picture->filepath}}" width=600>

    <a href="/crits/create/{{$picture->id}}">Write a review</a>
    <div>
        A critic by <b>{{$picture->critic->user->profile->name}}</b>
        <h4>{{$picture->critic->title}}</h4>
        <p>{{$picture->critic->review}}</p>
    </div>
</div>
@endsection
