@extends('layouts.app')

@section('content')
<h2 class="text-center m-4">Recent images</a></h2>
    <div class="row">
              @foreach($pictures as $picture)
              <div class='col-12 m-3 align-self-center'>
                <div class="card">
                <img src="{{ $picture->filepath }}" class="card-img-top" alt="picture"> <!-- style="height: 30rem; width: auto; object-fit: cover;" -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $picture->caption }}</h5>
                        <p class="card-text">Posted by <a href='/profile/{{ $picture->user_id }}'>{{ $picture->name }}</a></p>
                        <p class="card-text text-right"><small class="text-muted">{{ date('Y-m-d', strtotime($picture->created_at)) }}</small></p>
                    </div>
                </div>
                </div>
              @endforeach
   </div>
@endsection
