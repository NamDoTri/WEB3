@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{$picture->id}}/" method=post>
    @csrf
    @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit post</h2>
                </div>

                <div class="row">
                    <div>
                        <img src="{{$picture->filepath}}">
                    </div>
                    <div class="pt-3">
                        <label for="image" style="cursor: pointer;" class="btn btn-primary p-1">Choose another image</label>
                        <input type="file" class=form-control-file id=image name=image style="display: none">
                        @if ($errors->has('image'))
                            <!-- <strong>{{ $errors->first('image') }}</strong> -->
                            {{dd($errors)}}
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label "><b>Caption</b></label>

                    <input id="caption" 
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror" 
                        caption="caption" 
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
