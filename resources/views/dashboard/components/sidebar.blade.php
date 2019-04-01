<aside class="sidebar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <span class="brand">
                    <i class="fab fa-audible"></i>
                    دروس| Droos
                </span>
            </div>
        </div>
    
        <ul class="side-list remove-li">
            <li >
                <i class="far fa-tachometer-alt"></i>
                <span>الرئيسية</span>
            </li>
            <li class="active">
                <i class="far fa-user"></i>
                <span><a href="/profile"> الصفحة الشخصية</a></span>
            </li>
            <li>
                <i class="far fa-bell"></i>
                <span>الاشعارات</span>
            </li>
            <li>
                <i class="far fa-chart-pie"></i>
                <span>متابعة المهام</span>
            </li>
            <li>
                <i class="far fa-chart-pie"></i>
                <span><a href="/timeTable">حصصي</a></span>
            </li>
            <li> 
                <i class="far fa-chart-pie"></i>
                <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <span>تسجيل الخروج</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
            </li>
        </ul>
    </div>
</aside>