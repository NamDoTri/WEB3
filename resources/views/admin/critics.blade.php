@extends('layouts.app')

@section('content')
<h2 class="text-center m-4">Recent critics</a></h2>

  <br>
   <div class="card-columns">
      @foreach($critics as $critic)
         <div class="card mb-4">
            <div class="card-body">
               <h5 class="card-title">{{ $critic->title }}</h5>
               <p class="card-title">{{ $critic->review }}</p>
               <div class="row justify-content-between mx-1 my-0 py-0">
                  <p class="card-text text-left my-0 py-0">
                     <small class="text-muted">Posted by <a href="/profile/{{$critic->user_id}}">{{ $critic->name }}</a></small>
                  </p>
                  <p class="card-text text-right my-0 py-0">
                     <small class="text-muted">{{ date('Y-m-d', strtotime($critic->created_at)) }}</small>
                  </p>
              </div> 
            </div>
            <div class="card-footer">
               <div class="row justify-content-around">
                  <a class='btn btn-secondary' href="/pictures/{{$critic->picture_id}}">
                     See picture
                  </a>
                  <form action="{{ url('/crits/destroy', $critic->id)}}" method="POST">
                     {{ csrf_field() }}
                     @method('DELETE')
                     <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
               </div>
            </div>
         </div>
      @endforeach
   </div>
@endsection