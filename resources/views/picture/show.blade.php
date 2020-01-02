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

    @if(!is_null($picture->critics))
        @foreach($picture->critics as $critic)
            <div>
                <h4>{{$critic->title}}</h4>
                A critic by <b>{{$critic->user->profile->name}}</b>
                <p>{{$critic->review}}</p>
            </div>
            <div>Do you <br>
            <div>
                <button>Agree</button> or <button>Disagree</button>
            </div> 
        @endforeach

        @cannot('update', $picture->user->profile)
            <div class='pt-2'>
                <a href="/crits/create/{{$picture->id}}">Write another review</a>
            </div>
        @endcannot
    @else
        <div>No reviews available yet.</div>
        @cannot('update', $picture->user->profile)
            <div class='pt-2'>
                <a href="/crits/create/{{$picture->id}}">Write a review</a>
            </div>
        @endcannot
    @endif
    </div>
</div>
@endsection
