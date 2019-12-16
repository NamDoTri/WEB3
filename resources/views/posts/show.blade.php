@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{$post->host_link}}" width=600>
    <div>
        <span>{{$post->caption}}</span>
        <span>{{$post->likes}} likes</span>
        <span>{{$post->comments}} comments</span>
    </div>
</div>
@endsection
