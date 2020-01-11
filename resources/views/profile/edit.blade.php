@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" method=post enctype='multipart/form-data'>
    @csrf
    @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit profile</h2>
                </div>

                <div class="row">
                    <div>
                        <img src="{{$user->profile->profile_picture->filepath ?? 'https://www.sackettwaconia.com/wp-content/uploads/default-profile.png'}}">
                    </div>
                    <div class="pt-3">
                    @if ($errors->any())
                        <div class='mb-4'>
                            <ul class='list-group'>
                                @foreach ($errors->all() as $error)
                                    <li class='list-group-item list-group-item-danger'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <label for="picture" style="cursor: pointer;" class="btn btn-primary p-1">Choose another picture</label>
                <input type="file" class=form-control-file id=picture name=picture style="display: none">
                @if ($errors->has('picture'))
                    <strong>{{ $errors->first('picture') }}</strong>
                @endif
                </div>
                </div>

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
                <div class="form-group row">
                    <label for="effect" class="col-md-4 col-form-label text-md-right">Effect</label>

                    <select id="effect" 
                        class="form-control @error('effect') is-invalid @enderror" 
                        name="effect" 
                        value="{{ old('effect') ?? $user->profile->effect }}" 
                        autocomplete="effect" autofocus>
                        <option value='none'>None</option>
                        <option value='grey'>Greyscale</option>
                        <option value='star'>Star shape</option>
                        <option value='pixelate'>Pixelate</option>
                        <option value='invert'>Invert</option>
                    </select>
                </div>

                <div class="row">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
