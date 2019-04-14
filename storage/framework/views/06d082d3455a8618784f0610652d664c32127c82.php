<?php /* D:\PROJECTS\droos\resources\views/auth/login.blade.php */ ?>
<?php $__env->startSection('content'); ?>
    <form class="login" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="margin">
        <div class="spe">تسجيل الدخول</div>
        <div class="form-group">
            <label for="exampleInputEmail1">البريد الالكتروني</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-user"></i>
                </div>
                <div class="inp">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني" value="<?php echo e(old('email')); ?>" required autofocus>
                </div>
            </div>
            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">كلمة السر</label>
            <div class="con-icon">
                <div class="ico">
                    <i class="fas fa-key"></i>
                </div>
                <div class="inp">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر" required>
                </div>
            </div>
            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
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
        <button type="submit" class="btn app-btn-back app-btn-form">تسجيل الدخول</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>