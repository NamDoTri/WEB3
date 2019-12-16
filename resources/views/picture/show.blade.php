@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div>
            <h2>{{$picture->caption}}</h2>
            <span class='float-right'><b>{{$picture->likes}}</b> people liked this post</span>
            <img src="{{$picture->filepath}}" width=600>
        </div>
        <div>Credit: <b>{{$picture->user->profile->name}}</b></div>
    </div>

    @if(!is_null($picture->critic))
        <div>
            <h4>{{$picture->critic->title}}</h4>
            A critic by <b>{{$picture->critic->user->profile->name}}</b>
            <p>{{$picture->critic->review}}</p>
        </div>
        <div>Do you <br>
        <div>
            <button>Agree</button> or <button>Disagree</button>
        </div>
    @else
        <div>No reviews available yet.</div>
        <a href="/crits/create/{{$picture->id}}">Write a review</a>
    @endif
    </div>
</div>
@endsection
