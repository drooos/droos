@extends('home')
@section('homeContent')
{{ sizeof($studentCourses) }}
    <div class="container">
        <div class="row">
            @foreach( $studentCourses as $coursOnDay )
                @foreach( $coursOnDay as $course )
                <div class="card-deck col-lg-3">
                    <div class="card mb-4">
                        <div class="view overlay">
                            <img class="card-img-top" src={{ URL::asset($course['teacher_photo'])}} alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $course['teacher_first_name'] . ' ' . $course['teacher_last_name'] }}</h4>
                            <p class="card-text">
                                المادة : {{ $course['categoryName'] }} <br>
                                اليوم : {{ $course['groupDay'] }} <br>
                                الساعة: {{ $course['groupTime'] }} <br>
                                المكان : {{ $course['groupLocation'] }} <br>
                                المستوي : {{ $course['courseLevel'] }}
                            </p>
                        </div>
                        <br>
                        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                            <a type="button" class="btn btn-primary btn-lg">الذهاب للكورس</a>
                            <a type="button" class="btn btn-unique btn-lg">محادثة</a>
                            <a type="button" class="btn btn-dark btn-lg" href="/student/course/{{ $course['groupId'] }}/leave">المغادرة</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection