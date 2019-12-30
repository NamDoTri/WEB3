@extends('layouts.app')

@section('content')
<h2 class="text-center m-4">Uploaded images</a></h2>

  <br>
   <div class="card-columns">
      @foreach($pictures as $picture)
         <div class="card mb-4">
            <a href="/pictures/{{$picture->id}}">
               <img src="{{ $picture->filepath }}" style="border-radius: 5%;" class='card-img-top' >
            </a>
            <div class="card-body">
               <h5 class="card-title">{{ $picture->caption }}</h5>               
               <p class="card-text text-right"><small class="text-muted">{{ date('Y-m-d', strtotime($picture->created_at)) }}</small></p>
            </div>
            <div class="card-footer">
               <div class="row justify-content-end">
                  <form action="{{ route('pictures.destroy', $picture->id)}}" method="post">
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