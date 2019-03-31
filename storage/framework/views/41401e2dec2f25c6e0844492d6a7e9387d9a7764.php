<?php /* D:\PROJECTS\droos\resources\views/dashboard/profileComponents/editProfile.blade.php */ ?>
<div class="edit-profile">
    <h4>تعديل الصفحة الشخصية</h4>
    <form action="">
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">اسم المستخدم</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="اسم المستخدم">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" class="form-control" id="email"  placeholder="البريد الالكتروني">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="fname">الاسم الاول</label>
                        <input type="text" class="form-control" id="fname" placeholder="الاسم الاول">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="lname">اسم العائلة</label>
                        <input type="text" class="form-control" id="lname"  placeholder="اسم العائلة">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text" class="form-control" id="adress" placeholder="ادخل عنوانك كاملا">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">كلمة المرورالحالية</label>
                        <input type="password" class="form-control" id="password" placeholder="كلمة المرورالحالية">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="repassword">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" id="repassword" placeholder="كلمة المرور الجديدة">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="aboutMe">معلومات عني</label>
                        <textarea class="form-control" id="aboutMe" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">تعديل الصفحة الشخصية</button>

        </div>
    </form>
</div>