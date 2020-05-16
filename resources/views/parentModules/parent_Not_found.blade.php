@extends('home')
@section('homeContent')
@section('navTitle')
يا بابا مكااار 
<i class="far fa-grin-tongue-wink"></i>
@endsection
<div class="container">
    <div class="col-lg-4 mx-auto margin-tp-30">
        <div class="card ">
            <img class="card-img-top" src={{ URL::asset($image) }} alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><a>{{ $comment }}</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection