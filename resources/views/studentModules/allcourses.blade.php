@extends('home')
@section('homeContent')
@section('navTitle')
جميع الكورسات
@endsection
    <div class="container home"> 
        <div class="row">
                @foreach($allCourses as $onecourse)
                <div class="col-lg-3">
                    <div class="card card-cascade wider">
                        <div class="view view-cascade overlay">
                                <img  class="card-img-top" src={{ URL::asset('ProfilePics/'.$onecourse['teacher_photo']) }} alt="Card image cap">
                                <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body card-body-cascade text-center">
                            <h4 class="card-title"><strong>
                                {{ $onecourse['teacher_first_name'] . ' ' . $onecourse['teacher_last_name']}}
                            </strong></h4>
                            <h5 class="blue-text pb-2"><strong>
                                {{ $onecourse['subject'] }}
                            </strong></h5>
                            <p class="card-text">
                                {{ $onecourse['course_desc'] }}
                            </p>
                            <p>
                                عدد المجموعات: {{ $onecourse['groups_numbers'] }}
                            </p>
                            <a class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                            <a class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a><br>
                            <a type="button" class="btn btn-pink" href="/course/{{ $onecourse['courseId'] }}">مشاهدة الكورس كامل</a>
                            
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        <br><br>
        <div class="col-lg-5">
            <strong>
                {{ $allCourses->links() }}
            </strong>
        </div>
    </div>
@endsection

