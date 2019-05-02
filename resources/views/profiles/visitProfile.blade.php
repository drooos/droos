@extends('home')
@section('homeContent')

<div class="container">
  <div class="row">
    <div class="col-md-6 img">
      <img src="/ProfilePics/{{$user->imagePath}}"  alt="" class="img-rounded">
    </div>
    <div class="col-md-6 details">
      <blockquote>
        <h5>{{$user->userFname}}</h5>
        <small><cite title="Source Title">{{$user->userNumber}} <i class="icon-map-marker"></i></cite></small>
      </blockquote>
      <p>
            {{$user->teacherDetails}} <br>
      </p>
    </div>
  </div>
</div>
@endsection