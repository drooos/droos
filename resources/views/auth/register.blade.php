<<<<<<< HEAD
@extends('layout')
@section('content')
<div class=" register">

    <div class="row">
        
        <div class="col-md-9 register-right">
            
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item userRole" data-role="teacher">
                    <a class="nav-link active">
                        مدرس
                    </a>
                </li>
                <li class="nav-item userRole" data-role="parent">
                    <a class="nav-link">
                        ولي امر
                    </a>
                </li>
                <li class="nav-item userRole" data-role="student">
                    <a class="nav-link" >
                        طالب
                    </a>
                </li>
            </ul>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <input type="hidden" name="userRole" value="teacher" id="userRole">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">التسجيل كمدرس</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('userFname') ? ' is-invalid' : '' }}" placeholder="الاسم الاول*" value="{{ old('userFname') }}"  name="userFname"/>
                                @if ($errors->has('userFname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userFname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('userLname') ? ' is-invalid' : '' }}" placeholder="اسم العائلة*" value="{{ old('userLname') }}" name="userLname"/>
                                @if ($errors->has('userLname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userLname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="كلمة المرور *" value="" name="password" />
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control{{ $errors->has('repassword') ? ' is-invalid' : '' }}"  placeholder="تاكيد كلمة المرور *" value="" name="repassword"/>
                                @if ($errors->has('repassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('repassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="maxl col-3">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> ذكر </span> 
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="female">
                                            <span>انثي </span> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="البريد الالكتروني *" value="{{ old('email') }}" name="email"/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="12" name="userNumber" class="form-control{{ $errors->has('userNumber') ? ' is-invalid' : '' }}" placeholder="رقم هاتفك الجوال *" value=""/>
                                @if ($errors->has('userNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="secQ">
                                    <option class="hidden"  selected disabled>اختار سؤال الامان</option>
                                    <option>ما هو عيد ميلادك؟</option>
                                    <option>ما هو رقم هاتفك؟</option>
                                    <option>ما هو حيوانك المفضل؟</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="ادخل اجابتك *" value="" name="secAns"/>
                            </div>

                            <input type="submit" class="btnRegister"  value="تسجيل الحساب"/>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>مرحبا</h3>
            <p>انت قريب لاستكشاف موقع دروس !نتمني لك حظا سعيدا</p>
            <button class="app-btn-link"><a href='/login'>تسجيل الدخول</a></button>
            
        </div>    
    </div>
</div>
=======
@extends('layout')
@section('content')
<div class=" register">

    <div class="row">
        
        <div class="col-md-9 register-right">
            
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item userRole" data-role="teacher">
                    <a class="nav-link active">
                        مدرس
                    </a>
                </li>
                <li class="nav-item userRole" data-role="parent">
                    <a class="nav-link">
                        ولي امر
                    </a>
                </li>
                <li class="nav-item userRole" data-role="student">
                    <a class="nav-link" >
                        طالب
                    </a>
                </li>
            </ul>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <input type="hidden" name="userRole" value="teacher" id="userRole">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">التسجيل كمدرس</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('userFname') ? ' is-invalid' : '' }}" placeholder="الاسم الاول*" value="{{ old('userFname') }}"  name="userFname"/>
                                @if ($errors->has('userFname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userFname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('userLname') ? ' is-invalid' : '' }}" placeholder="اسم العائلة*" value="{{ old('userLname') }}" name="userLname"/>
                                @if ($errors->has('userLname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userLname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="كلمة المرور *" value="" name="password" />
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="تاكيد كلمة المرور *" value="" name="password_confirmation"/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="maxl col-3">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="1" checked>
                                            <span> ذكر </span> 
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="2">
                                            <span>انثي </span> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="البريد الالكتروني *" value="{{ old('email') }}" name="email"/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="12" name="userNumber" class="form-control{{ $errors->has('userNumber') ? ' is-invalid' : '' }}" placeholder="رقم هاتفك الجوال *" value=""/>
                                @if ($errors->has('userNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select class="form-control{{ $errors->has('secQ') ? ' is-invalid' : '' }}" name="secQ">
                                    <option class="hidden"  selected disabled>اختار سؤال الامان</option>
                                    <option value="1">ما هو عيد ميلادك؟</option>
                                    <option value="2">ما هو رقم هاتفك؟</option>
                                    <option value="3">ما هو حيوانك المفضل؟</option>
                                </select>
                                @if ($errors->has('secQ'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secQ') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('secAns') ? ' is-invalid' : '' }}" placeholder="ادخل اجابتك *" value="" name="secAns"/>
                                @if ($errors->has('secAns'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secAns') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="submit" class="btnRegister"  value="تسجيل الحساب"/>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>مرحبا</h3>
            <p>انت قريب لاستكشاف موقع دروس !نتمني لك حظا سعيدا</p>
            <button class="app-btn-link"><a href='/login'>تسجيل الدخول</a></button>
            
        </div>    
    </div>
</div>
>>>>>>> master
@endsection