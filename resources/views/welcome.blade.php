@extends('layouts.app')

@section('content')
<h2 class="text-center m-4">Recent images</a></h2>
    <div class="row">
        <!--<div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Image</th>
                 <th>Created at</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>-->
              @foreach($pictures as $picture)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $picture->caption }}</h5>
                        <p class="card-text">description</p>
                        <p class="card-text"><small class="text-muted">{{ date('Y-m-d', strtotime($picture->created_at)) }}</small></p>
                    </div>
                    <img src="{{ $picture->filepath }}" class="card-img-top" alt="picture">
                </div>
              <!--<tr>
                 <td>{{ $picture->id }}</td>
                 <td><img src="{{ $picture->filepath }}" style="width: 30%; height: 30%; border-radius: 5%;"></td>
                 <td>{{ date('Y-m-d', strtotime($picture->created_at)) }}</td>
                 <td><a href="{{ route('pictures.edit',$picture->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('pictures.destroy', $picture->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>-->
              @endforeach
           <!--</tbody>
          </table>
          {!! $pictures->links() !!}
       </div> -->
   </div>
@endsection
