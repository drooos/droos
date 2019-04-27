@extends('home')
@section('homeContent')
    <div class="container home">
        <div class="row">
            <div class="col-4 ">
                @include('profiles.profileComponents.profileDetails')
            </div>
            <div class="col-7">
                /////////
            </div>
            
            <div class="col-11">
                <h1>الكورسات</h1>
                @include('profiles.profileComponents.profileCourses')
            </div>
            
            <div class="col-11">
                <h1>الإعلانات</h1>
                @include('profiles.profileComponents.profileAnnouncements')
            </div>
        </div>
    </div>
@endsection