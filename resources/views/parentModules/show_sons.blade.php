@extends('home')
@section('homeContent')
<br> <br> <br>
@section('navTitle')
مشاهدة الابناء
@endsection
<div class="container">
    @if(isset($sons) && sizeof($sons)>0)
    <div class="row">
        @foreach($sons as $row)
            @foreach($row as $son)
            <div class="col-lg-3">
                <div class="card col-lg-12" >
                    <img src={{ URL::asset('ProfilePics/'.$son['imagePath']) }} class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $son->userFname . ' ' . $son->userLname }}
                        </h5>
                        
                        <p class="card-text">
                            رقم الموبايل :{{ $son->userNumber }}<br>
                            البريد الالكتروني: {{ $son->email }}<br>
                            الصف : الاول الابتدئي
                        </p>
                        <a href="/sons/timeTable/{{ $son->id }}" class="btn btn-primary"> عرض الجدول</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
    @endif
    <br><br>
    <button type="button" class="btn btn-dark">
        <a href="linkSon">
            اضافة ابن
        </a>
    </button>
</div>
@endsection