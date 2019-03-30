@extends('home')
@section('homeContent')
    <div class="container home">
        <div class="row">
            <div class="col-4 ">
                @include('dashboard.profileComponents.profileDetails')
            </div>
            <div class="col-7">
                @include('dashboard.profileComponents.editProfile')
            </div>
            @if($user['Role']=='instructor')
            <div class="col-11">
                <h1>الكورسات</h1>
                @include('dashboard.profileComponents.profileCourses')
            </div>
            @endif
            <div class="col-11">
                <h1>الإعلانات</h1>
                @include('dashboard.profileComponents.profileAnnouncements')
            </div>
        </div>
    </div>
@endsection