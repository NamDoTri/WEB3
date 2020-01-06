@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{$picture->id}}/" method=post enctype="multipart/form-data">
    @csrf
    @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit post</h2>
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
                <div class="row">
                    <div>
                        <img src="{{$picture->filepath}}">
                    </div>
                    <div class="pt-3">
                        <label for="picture" style="cursor: pointer;" class="btn btn-primary p-1">Choose another picture</label>
                        <input type="file" class=form-control-file id=picture name=picture style="display: none">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label "><b>Caption</b></label>

                    <input id="caption" 
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" 
                        value="{{ old('caption') ?? $picture->caption }}" 
                        autocomplete="caption" autofocus>
                </div>

                <div class="row">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
