<?php $user = App\Http\Controllers\users::getInfoForActiveUser();?>
<div class="profile-card">
    <div class="top">
        <img src="imgs/14.jpg" alt="">
    </div>
    <div class="img-cir">
        <img src="ProfilePics/{{ Auth::user()->imagePath }}" alt="">
    </div>
    <div class="down">
            <form action="home/ChangePic" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="file" name="file">
                <button type="submit" class="btn btn-primary">تغيير</button>
            </form>
        <p class="name">{{ $user[0]['userFname'] }} {{ $user[0]['userLname'] }} </p>
        <p class="username"> {{ $user[0]['email'] }}</p>
        <p class="desc">test</p>
        <p class="userNumber">{{ $user[0]['userNumber'] }}</p>
    </div>
    <div class="bot-panel">
        <ul class="row">
            <li class="col-4">test <br> فايل</li>
            <li class="col-4">200 <br> لالالي</li>
            <li class="col-4">242 <br> هاايلي</li>
            
        </ul>
    </div>
</div>
