@extends('home')
@section('homeContent')
<div class="container">
    <h2>الطلبات المعلقة</h2>
    <br>
    <div class="row">
        @foreach( $pendingStudents as $student )
            <div class="col-lg-3">
                <div class="card card-cascade narrower">
                    <div class="view view-cascade overlay">
                    <img  class="card-img-top" src={{ URL::asset($student['student_img']) }} alt="Card image cap">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                    </div>
                    <div class="card-body card-body-cascade">
                        <h5 class="pink-text pb-2 pt-1"><i class="far fa-user"></i> مدرسة الخوستيقة </h5>
                        <h4 class="font-weight-bold card-title">
                            {{ $student['studentf_name'] . ' ' . $student['studentl_name']}}
                        </h4>
                        <p class="card-text">
                            اليوم :{{ $student['groupDay'] }} <br>
                            المعاد: {{ $student['groupTime'] }} <br>
                            المادة: {{ $student['subject_name'] }} <br>
                            المستوي: {{ $student['level'] }}
                        </p>
                        <a class="btn btn-primary" href="/group/active/{{ $student['student_id'] }}/{{ $student['group_id'] }}">قبول</a>
                        <a class="btn btn-danger" href="/group/delete/{{ $student['student_id'] }}/{{ $student['group_id'] }}">رقض</a>
                        <a class="btn btn-dark" href="/profile/{{ $student['student_id'] }}">مشاهدة الصفحة</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- row -->
</div><!-- contianer -->
{{ sizeof($pendingStudents) }}
@endsection