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
        </div>
    </div>
@endsection