<?php /* D:\PROJECTS\droos\resources\views/dashboard/profile.blade.php */ ?>
<?php $__env->startSection('homeContent'); ?>
<div class="container home">
    <div class="row">
        <div class="col-4 ">
            <?php echo $__env->make('dashboard.profileComponents.profileDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-7">
            <?php echo $__env->make('dashboard.profileComponents.editProfile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>