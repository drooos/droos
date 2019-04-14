@extends('home')
@section('homeContent')
<div class="container home">
    <div class="row">
        <div class="col-5">
                @include('courses.courseActions.courseTeacherCard')
        </div>
    </div>
</div>
@endsection