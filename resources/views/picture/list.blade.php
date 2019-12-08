@extends('layouts.app')

@section('content')
<a href="{{ route('pictures.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Image</th>
                 <th>Created at</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($pictures as $picture)
              <tr>
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
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $pictures->links() !!}
       </div> 
   </div>
@endsection