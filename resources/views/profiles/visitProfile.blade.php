@extends('home')
@section('homeContent')
<div class="col-lg-4 margin-tp-30 ">
<div class="profile-card example z-depth-5">
    <div class="top">
        <img src="/ProfilePics/{{$user->imagePath}}" alt="">
    </div>
    <div class="img-cir">
        <img src="/ProfilePics/{{$user->imagePath}}" alt="">
    </div>
    <div class="down">
        <p class="name">{{ $user->userFname }} {{ $user->userLname }} </p>
        <p class="username"> {{ $user->email }}</p>
        <p class="desc">test</p>
        <p class="userNumber">{{ $user->userNumber }}</p>
    </div>
    <div class="bot-panel">
        <ul class="row">
            <li class="col-4">test <br> فايل</li>
            <li class="col-4">200 <br> لالالي</li>
            <li class="col-4">242 <br> هاايلي</li>
            
        </ul>
    </div>
</div>
</div>
@endsection


