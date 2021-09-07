<?php $__env->startSection('title',"users"); ?>

<?php $__env->startSection("custom-style"); ?>
    <?php echo $__env->make("admin.files.uploadModalCss", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4><?php echo e((isset($edit_user))?"ویرایش کاربر":"لیست کاربران"); ?></h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route("dashboard")); ?>">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">کاربران</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <!-- begin::page content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo e((isset($edit_user))?"ویرایش کاربر ".$edit_user->first_name:"ایجاد کاربر"); ?></h6>
                        <form class="needs-validation" action="<?php echo e((isset($edit_user))?route("user.update",$edit_user->id):route("user.store")); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($edit_user)): ?>
                                <input type="hidden" name="_method" value="PATCH">
                            <?php endif; ?>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">نام</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" autocomplete="off"
                                           placeholder="نام" value="<?php echo e(isset($edit_user)?$edit_user->first_name:''); ?>"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" autocomplete="off"
                                           placeholder="نام خانوادگی" value="<?php echo e(isset($edit_user)?$edit_user->last_name:''); ?>"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">ایمیل</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                           placeholder="ایمیل" value="<?php echo e(isset($edit_user)?$edit_user->email:''); ?>"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_number">شماره_موبایل</label>
                                    <input type="text" name="mobile_number" class="form-control" id="mobile_number"
                                           placeholder="شماره موبایل" value="<?php echo e(isset($edit_user)?$edit_user->mobile_number:''); ?>"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">رمز عبور</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="رمز عبور" autocomplete="new-password">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="website_type_id">نوع سایت درخواستی</label>
                                    <select type="text" name="website_type_id" class="form-control" id="website_type_id"
                                          autocomplete="off">
                                        <option value="">نوع سایت درخواستی</option>
                                        <?php $__currentLoopData = $website_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $web): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($web->id); ?>"
                                            <?php echo e((isset($edit_user) && $edit_user->website_type_id == $web->id)?"selected":''); ?>><?php echo e($web->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="familiarity_type_id">نحوه ی آشنایی با ما</label>
                                    <select type="text" name="familiarity_type_id" class="form-control" id="familiarity_type_id"
                                            autocomplete="off">
                                        <option value="">نحوه ی آشنایی با ما</option>
                                        <?php $__currentLoopData = $familiarity_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($fam->id); ?>"
                                                    <?php echo e((isset($edit_user) && $edit_user->familiarity_type_id == $fam->id)?"selected":''); ?>><?php echo e($fam->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="roleSelect">نقش کاربری</label>
                                    <select class="form-control" id="roleSelect" name="user_type"
                                    required="required">
                                        <option value="" >نقش کاربری</option>
                                        <option value=0 <?php echo e((isset($edit_user) && $edit_user->is_admin == 0)?"selected":''); ?>>کاربر</option>
                                        <option value=1 <?php echo e((isset($edit_user) && $edit_user->is_admin == 1)?"selected":''); ?>>ادمین</option>

                                    </select>
                                </div>
                            </div>





























                            <div class="col-12 mb-3">
                                <button class="btn btn-primary float-right" name="updatePostData" id="submit-all"
                                        type="submit">
                                    <?php echo e((isset($edit_user))?"ویرایش کاربر":"افزودن کاربر"); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end::page content -->





<?php $__env->stopSection(); ?>



<?php $__env->startSection('custom-script'); ?>

    <?php echo $__env->make("admin.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/users/create.blade.php ENDPATH**/ ?>