@extends('home')
@section('homeContent')
    <div class="container">
        <form action="/parent/linkSon" method="POST">
            @csrf
            <input class="form-control form-control-lg" type="text" name="sonCode" placeholder="ادخل كود الابن المكون من 10 احرف">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($result) && sizeof($result)>0)
            <div class="row container">
                @foreach($result as $student)
                    @foreach($student as $row)
                        <div class="card col-lg-3 col-md-6 col-sm-12" style="width: 18rem;">
                            <img src="../imgs/male.png" class="card-img-top" alt="{{ $row->userFname .' ' . $row->userLname }}">
                            <div class="card-body">
                                <p class="card-text">
                                    الاسم : {{ $row->userFname .' ' . $row->userLname }} <br>
                                    البريد : {{ $row->email }}
                                </p>
                                <form action="/parent/finishLink" method="POST">
                                    @csrf
                                    <div class="btns row">
                                        <div class="btn-group col-md-12" role="group" aria-label="Basic example">
                                            <input type="hidden" name="studentId" value="{{ $row->id }}">
                                            <button type="submit" type="button" class="btn btn-secondary">هذا هو ابني حقا</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endif

        @if(isset($result) && sizeof($result)==0)
            NOOOOOOOOOOOOOOOO
        @endif
    </div>
@endsection