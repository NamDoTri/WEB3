@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{$picture->filepath}}" width=600>
    <div>
        <span>{{$picture->caption}}</span>
        <span>{{$picture->likes}} likes</span>
    </div>
    <a href="/crits/create/{{$picture->id}}">Write a review</a>
    <div>There must be something printed after this: {{$picture}}</div>
</div>
@endsection
