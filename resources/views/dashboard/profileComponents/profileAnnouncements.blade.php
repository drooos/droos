<div class="row">
    @foreach ($user['Announcements'] as $ann)
    <div class="profile-card col-3" style="display: inline-block;">
        <div class="top">
            <img src="imgs/14.jpg" alt="">
        </div>
        <div class="down" style="padding-top:0px;">
            <p class="name">{{$ann}}</p>
            <p class="desc">NEW POST!</p>
        </div>
    </div>
    @endforeach
</div>