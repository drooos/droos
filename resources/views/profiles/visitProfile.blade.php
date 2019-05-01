
<!------ Include the above in your HEAD tag ---------->
<style>
    .container{
        padding:5%;
    }
    .container .img{
        text-align:center;
    }
    .container .details{
        border-left:3px solid #ded4da;
    }
    .container .details p{
        font-size:15px;
        font-weight:bold;
    }
</style>
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
            {{$user->email}} <br>

      </p>
    </div>
  </div>
</div>