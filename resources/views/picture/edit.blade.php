@extends('layouts.app')

@section('content')
<h2 class="text-center m-4">Edit Image</h2>

@if ($errors->any())
    <div class='mb-4'>
        <ul class='list-group'>
            @foreach ($errors->all() as $error)
                <li class='list-group-item list-group-item-danger'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form 
    action="{{ route('pictures.update', $picture_info->id) }}" 
    method="POST" 
    name="update_product"
    enctype="multipart/form-data"
>
{{ csrf_field() }}
@method('PATCH')
 
<div class="input-group m-4">
  <div class="custom-file mr-4">
    <input type="file" class="custom-file-input" name='file'>
    <label class="custom-file-label" for="file">Choose file</label>
  </div>
</div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Upload image</button>
    </div>
 
</form>
<script type="application/javascript">
    $('input[type="file"]').change((e) => {
        const fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endsection