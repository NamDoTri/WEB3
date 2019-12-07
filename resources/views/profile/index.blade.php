@extends('layouts.app')

@section('content')
<!--Header of personal profile page-->
<div class="row">
    <div class="col-3 p-5">
        <img src="<?php echo $user->profile->profile_picture ?>" class="rounded-circle" height=190px>
    </div>
    <div class="col-9 p-5">
        <div><h2>{{$user->name}}</h2></div>
        <div class="d-flex">
            <div class="pr-5"><strong>{{$user->profile->posts}}</strong> posts</div>
            <div class="pr-5"><strong>{{$user->profile->followers}}</strong> followers</div>
            <div class="pr-5"><strong>{{$user->profile->following}}</strong> following</div>
        </div>
        <div>
            {{$user->profile->description}}
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <button>
        Add image <!--TODO: change this to a plus icon-->
    </button>
</div>
<!--Posts go here-->
<div class="row">
    <div class="col-3">
        <?php 
            foreach($posts as $post){
                echo '<img src='.$post->host_link.'>';
            }
        ?>
    </div>
</div>
@endsection
