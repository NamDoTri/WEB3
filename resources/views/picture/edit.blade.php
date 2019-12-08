@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
<br>
 
<form 
    action="{{ route('pictures.update', $picture_info->id) }}" 
    method="POST" 
    name="update_product"
    enctype="multipart/form-data"
>
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
<div class="form-group">
        <label for="file">Update file:</label>
        <input type="file" class="form-control" name="file"/>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Upload image</button>
    </div>
</div>
 
</form>
@endsection