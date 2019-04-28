@extends('home')
@section('homeContent')
    <div class="container home">
        <div class="row">
            <div class="col-4 ">
                @include('profiles.profileComponents.profileDetails')
            </div>
            <div class="col-7">
                @include('teacherModules.teacher_editProfile')
            </div>
        </div>
    </div>
@endsection