<?php /* D:\PROJECTS\droos\resources\views/login.blade.php */ ?>
<?php $__env->startSection('content'); ?>
    <form class="login">
        <div class="margin">
        <div class="spe">تسجيل الدخول</div>
        <div class="form-group">
            <label for="exampleInputEmail1">البريد الالكتروني</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-user"></i>
                </div>
                <div class="inp">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">كلمة السر</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر">
        </div>
        <div class="form-group row">
                <div class="col-sm-2">تذكرني</div>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                  </div>
                </div>
              </div>
        </div>
        <button type="submit" class="btn app-btn-back app-btn-form">تسجيل الدخول</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>