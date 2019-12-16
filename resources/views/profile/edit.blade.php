@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" method=post>
    @csrf
    @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit profile</h2>
                </div>

                <!-- <div class="row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Update profile picture</label>
                    <input type="file" class=form-control-file id=image name=image>
                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div> -->

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

                    <input id="name" 
                        type="text"
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') ?? $user->profile->name }}" 
                        autocomplete="name" autofocus>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <input id="description" 
                        type="text"
                        class="form-control @error('description') is-invalid @enderror" 
                        name="description" 
                        value="{{ old('description') ?? $user->profile->description }}" 
                        autocomplete="description" autofocus>
                </div>

                <div class="row">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
