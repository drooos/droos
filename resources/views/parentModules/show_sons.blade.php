@extends('home')
@section('homeContent')
@section()
    <button type="button" class="btn btn-dark">
        <a href="linkSon">
            اضافة ابن
        </a>
    </button>
    @if(isset($sons) && sizeof($sons)>0)
    <div class="row container">
        @foreach($sons as $row)
            @foreach($row as $son)
            <div class="card col-lg-3" style="width: 18rem;">
                <img src="../imgs/male.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $son->userFname . ' ' . $son->userLname }}
                    </h5>
                    <p class="card-text">
                        الاول الابتدائي
                    </p>
                    <a href="#" class="btn btn-primary">متابعة النشاطات</a>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
    @endif
@endsection