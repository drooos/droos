
<?php $user = App\Http\Controllers\users::getInfoForActiveUser();?>

<aside class="sidebar z-depth-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <span class="brand">
                    <i class="fab fa-audible"></i>
                    دروس| Droos
                </span>
            </div>
        </div>
        <div class="img">
            <div class="img-cir">
                <img src={{ URL::asset('ProfilePics/'.$user[0]['imagePath']) }} alt="">
            </div>
        </div>
        <ul class="side-list remove-li">
                <div class="name">
                        <p class="name">{{ $user[0]['userFname'] }} {{ $user[0]['userLname'] }} </p>
                </div>
            @foreach (\App\Http\Controllers\users::getSide() as $item)
                <li>
                    <i class="{{ $item['icon'] }}"></i>
                    <span><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></span>
                    @if(isset( $item['number'] ))
                        <span class="badge badge-pill badge-secondary">{{ $item['number'] }}</span>
                    @endif
                </li>
            @endforeach
            <li> 
                <i class="far fa-chart-pie"></i>
                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>تسجيل الخروج</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>