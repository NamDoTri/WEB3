@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{$picture->filepath}}" width=600>
    <div>
        <span>{{$picture->caption}}</span>
        <span>{{$picture->likes}} likes</span>
        <span>{{$picture->comments}} comments</span>
    </div>
</div>
@endsection
