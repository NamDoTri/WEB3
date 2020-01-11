@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/crits/upload/{{$picture->id}}" enctype="multipart/form-data" method=post>
    @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Write a review</h2>
                </div>

                <div>
                    <img src="{{$picture->filepath}}">
                </div>
                @if ($errors->any())
                        <div class='mb-4'>
                            <ul class='list-group'>
                                @foreach ($errors->all() as $error)
                                    <li class='list-group-item list-group-item-danger'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                    <input id="title" 
                        type="text"
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" 
                        value="{{ old('title') }}" 
                        autocomplete="title" autofocus>
                </div>

                <div class="form-group row">
                    <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>

                    <input id="review" 
                        type="text"
                        class="form-control @error('review') is-invalid @enderror" 
                        name="review" 
                        value="{{ old('review') }}" 
                        autocomplete="review" autofocus>
                </div>

                <div class="row">
                    <button class="btn btn-primary">Publish</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
