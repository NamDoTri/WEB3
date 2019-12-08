@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Product</a></h2>
<br>
 
<form 
   action="{{ route('pictures.store') }}" 
   method="POST" 
   name="add_picture" 
   enctype="multipart/form-data"
>
{{ csrf_field() }}
 
<div class="row">
   <div class="form-group">
        <label for="file">File:</label>
        <input type="file" class="form-control" name="file"/>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Upload image</button>
    </div>
</div>
 
</form>
@endsection