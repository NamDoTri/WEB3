@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div>
            <h2>{{$picture->caption}}</h2>
            <div class='row'>
                <div class='col-9'>
                    <img src="{{$picture->filepath}}" width=600>
                </div>
                <div class='col-3'>
                    <p><b>{{$picture->likes}}</b> people liked this post</p>
                    <a class='btn btn-primary' href="/pictures/export/{{$picture->id}}">Export to PDF</a>
                </div>
            </div>
        </div>
        <div>Credit: <b>{{$picture->user->profile->name}}</b></div>
    </div>


    @if(sizeof($picture->critics) != 0)
        @foreach($picture->critics as $critic)
            <div>
                <h4>{{$critic->title}}</h4>
                A critic by <b>{{$critic->user->profile->name}}</b>
                <p>{{$critic->review}}</p>
            </div>
            
            <div>
                <a href="/critic/showagrees/{{$critic->id}}">Agrees: {{$critic->likers()->get()->count()}}</a>
                <!-- Disagrees: {{$critic->downvoters()->get()->count()}} -->
            </div>

            @if( auth()->user()->hasLiked($critic) )
            <div>You agreed.</div>
            <disagree crit-id="{{ $critic->id }}"></disagree>
            @else
            <div>Do you <br>
            <div>
                <agree crit-id="{{ $critic->id }}"></agree> or <disagree crit-id="{{ $critic->id }}"></disagree>
            </div>
            @endif
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
