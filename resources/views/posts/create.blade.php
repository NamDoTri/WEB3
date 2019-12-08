@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method=post>
    @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Add new post</h2>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>

                    <input id="caption" 
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" 
                        value="{{ old('caption') }}" 
                        autocomplete="caption" autofocus>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Post an image</label>
                    <input type="file" class=form-control-file id=image name=image>
                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row">
                    <button class="btn btn-primary">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
