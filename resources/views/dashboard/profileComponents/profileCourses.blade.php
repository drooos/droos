<div class="row">
    @foreach ($user['Courses'] as $course)
    <div class="profile-card col-3" style="display: inline-block;">
        <div class="top">
            <img src="imgs/14.jpg" alt="">
        </div>
        <div class="down" style="padding-top:0px;">
            <p class="name">{{$course}}</p>
            <p class="desc">Wow! Nice! </p>
        </div>
    </div>
    @endforeach
</div>