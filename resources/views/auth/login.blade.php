@extends('layout')
@section('content')
    <form class="login" method="POST" action="{{ route('login') }}">
        @csrf
        @if (Auth::check())
            <p>{{ Auth::user()->email }}</p>
        @endif
        <div class="margin">
        <div class="spe">تسجيل الدخول</div>
        <div class="form-group">
            <label for="exampleInputEmail1">البريد الالكتروني</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-user"></i>
                </div>
                <div class="inp">
<<<<<<< HEAD
                    <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني" value="{{ old('email') }}" required autofocus>
=======
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني" value="{{ old('email') }}" required autofocus>
>>>>>>> master
                </div>
            </div>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">كلمة السر</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-key"></i>
                </div>
                <div class="inp">
<<<<<<< HEAD
                    <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر" required>
=======
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر" required>
>>>>>>> master
                </div>
            </div>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
                <div class="col-sm-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                        </div>
                    </div>
            <div class="col-sm-11">تذكرني</div>
            </div>
        </div>
        <button name="submit" type="submit" class="btn app-btn-back app-btn-form">تسجيل الدخول</button>
    </form>
@endsection
