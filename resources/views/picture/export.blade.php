<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>{{ $title }}</title>
</head>
<body>
  <h1>{{ $heading }}</h1>
  <div class="container">
    <div>
      <h2>{{$picture->caption}}</h2>
      <div class='row text-center'>
        <img src="{{$picture->filepath}}" width=600>
      </div>
      <p><b>{{$picture->likes}}</b> people liked this post</p>
      <p>Credit: <b>{{$picture->user->profile->name}}</b></p>
    </div>

    @if(sizeof($picture->critics) != 0)
      @foreach($picture->critics as $critic)
        <div>
          <h4>{{$critic->title}}</h4>
          A critic by <b>{{$critic->user->profile->name}}</b>
          <p>{{$critic->review}}</p>
        </div>
        <div>
          Agrees: {{$critic->likers()->get()->count()}}
          Disagrees: {{$critic->downvoters()->get()->count()}}
        </div>
      @endforeach
    @else
      <div>No reviews available yet.</div>
    @endif
  </div>
</body>
</body>
</html>