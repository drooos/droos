<?php $teacherDetails = App\teachers::GetTeacherDetails(); ?>
<div class="edit-profile example z-depth-3">
    <h4>تعديل الصفحة الشخصية</h4>
<form action="Profile/Edit" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="fname">الاسم الاول</label>
                        <input name="fname" type="text" class="form-control" id="fname" placeholder="الاسم الاول" value="{{ Auth::user()->userFname }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="lname">اسم العائلة</label>
                        <input name="lname" type="text" class="form-control" id="lname"  placeholder="اسم العائلة" value="{{ Auth::user()->userLname }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input name="email" type="email" class="form-control" id="email"  placeholder="البريد الالكتروني" value="{{ Auth::user()->email }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">كلمة المرورالحالية</label>
                        <input name="prevpass" type="password" class="form-control" id="password" placeholder="كلمة المرورالحالية">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="repassword">كلمة المرور الجديدة</label>
                        <input name="newpass" type="password" class="form-control" id="repassword" placeholder="كلمة المرور الجديدة">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="aboutMe">معلومات عني</label>
                        <textarea name="myinfo" class="form-control" id="aboutMe" rows="3">{{$teacherDetails}}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">تعديل الصفحة الشخصية</button>

        </div>
    </form>
