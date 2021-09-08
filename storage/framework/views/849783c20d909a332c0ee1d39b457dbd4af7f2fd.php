

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h5 style="float: right">تایید کد</h5></div>

                    <div class="card-body" style="direction: rtl">
                        <?php echo $__env->make("auth.errors", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" style="direction: rtl">
                            <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('code.check')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">کد چهار رقمی:</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" value="<?php echo e(old('code')); ?>" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       ورود
                                    </button>

                                    <br>
                                </div>
                            </div>
                        </form>
                        <?php if($errors->has('expired')): ?>
                            <form method="POST" action="<?php echo e(route('code.send.again')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="getid">
                                <input type="submit" name="submit" value="رسال مجدد کد تایید">

                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/auth/code.blade.php ENDPATH**/ ?>