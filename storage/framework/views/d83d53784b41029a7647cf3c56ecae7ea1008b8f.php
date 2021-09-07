<?php $__env->startSection('title',"users"); ?>

<?php $__env->startSection("custom-style"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("vendors/dataTable/dataTables.min.css")); ?>">
    <style>
        tr {
            text-align: center;
        }

        td {
            text-align: center;
            direction: ltr;
            font-family: "Nunito", sans-serif;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>لیست کاربران</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route("dashboard")); ?>">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">لیست کاربران</li>
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
                        <h6 class="card-title">کاربران</h6>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>شماره موبایل</th>
                                    <th>نوع سایت درخواستی</th>
                                    <th>نحوه ی آشنایی با ما</th>
                                    <th>سطح دسترسی</th>
                                    <th>تاریخ عضویت</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->first_name); ?></td>
                                        <td><?php echo e($user->last_name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->mobile_number); ?></td>
                                        <td><?php echo e(isset($user->website_type->name)? $user->website_type->name:''); ?></td>
                                        <td><?php echo e(isset($user->familiarity_type->name)? $user->familiarity_type->name:''); ?></td>
                                        <td><?php if($user->is_admin): ?>
                                                ادمین
                                            <?php else: ?>
                                                کاربر
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($user->created_at_fa); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="<?php echo e(route("user.edit",$user->id)); ?>">ویرایش کاربر</a>
                                                    <form method="post" action="<?php echo e(route("user.destroy",$user->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button class="dropdown-item" type="submit">حذف کاربر</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end::page content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("custom-script"); ?>
    <script src="<?php echo e(asset("vendors/dataTable/jquery.dataTables.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendors/dataTable/dataTables.bootstrap4.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendors/dataTable/dataTables.responsive.min.js")); ?>"></script>
    <script src="<?php echo e(asset("assets/js/examples/datatable.js")); ?>"></script>

    <?php echo $__env->make("admin.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/users/list.blade.php ENDPATH**/ ?>