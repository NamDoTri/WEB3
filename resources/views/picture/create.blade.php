@extends('layouts.app')

@section('content')
<h2 class='text-center m-4'>Add Picture</h2>

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
   action="{{ route('pictures.store') }}" 
   method="POST" 
   name="add_picture" 
   enctype="multipart/form-data"
>
{{ csrf_field() }}
 

<div class="input-group m-4">
  <div class="custom-file mr-4">
    <input type="file" class="custom-file-input" name='file'>
    <label class="custom-file-label" for="file">Choose file</label>
  </div>
</div>

<div class="input-group m-4">
  <div class="mr-4">
    <input type="text" class="" name='caption'>
    <label class="" for="caption">Caption</label>
  </div>
</div>

<!--
   <div class="form-group">
        <label for="file">File:</label>
        <input type="file" class="form-control" name="file"/>
    </div>
--> 
<div class="text-right">
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