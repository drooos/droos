@extends('layout')
@section('content')
<div class=" register">
    <div class="row">
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        مدرس
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ولي امر</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        طالب
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">التسجيل كمدرس</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الاسم الاول*" value=""  name="fname"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الاسم الثاني*" value="" name="lname"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="كلمة المرور *" value="" name="password" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  placeholder="تاكيد كلمة المرور *" value="" name="repassword"/>
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
                                <input type="email" class="form-control" placeholder="البريد الالكتروني *" value="" name="email"/>
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="12" name="Phone" class="form-control" placeholder="رقم هاتفك الجوال *" value=""/>
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
@endsection