<?php $__env->startSection('title',"کوپن ها"); ?>

<?php $__env->startSection("custom-style"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("vendors/dataTable/dataTables.min.css")); ?>">
    <style>
        tr{
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
            <h4>لیست کوپن ها</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route("dashboard")); ?>">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">کوپن ها</li>
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
                        <h6 class="card-title">کوپن ها</h6>
                        <p class="card-title"><a href="<?php echo e(route('voucher.create')); ?>">ایجاد کوپن</a></p>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered" style="width: auto">
                                <thead>
                                <tr>
                                    <th class="text-center">نام کوپن</th>
                                    <th>کد</th>
                                    <th>توضیحات</th>
                                    <th>تعداد دفعات استفاده شده</th>
                                    <th>حداکثر دفعات قابل استفاده</th>
                                    <th>حداکثر دفعات قابل استفاده برای هر کاربر</th>
                                    <th>حداقل خرید</th>
                                    <th>حداکثر خرید</th>
                                    <th>مقدار تخفیف</th>
                                    <th>تاریخ شروع اعتبار</th>
                                    <th>تاریخ پایان اعتبار</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($voucher->name); ?></td>
                                       <td><?php echo e($voucher->code); ?></td>
                                        <td><?php echo e($voucher->description); ?></td>

                                        <td><?php echo e($voucher->times_used); ?></td>

                                         <td><?php echo e($voucher->max_uses); ?></td>
                                        <td><?php echo e($voucher->max_uses_user); ?></td>

                                        <td><?php echo e($voucher->min_price); ?></td>
                                        <td><?php echo e($voucher->max_price); ?></td>
                                            <td dir="ltr">

                                                <?php echo e(($voucher->discount_value)); ?>

                                                <?php if($voucher->discount_type == 0): ?>
                                                    تومان
                                                <?php elseif($voucher->discount_type == 1): ?>
                                                     %
                                                <?php endif; ?>

                                            </td>

                                        <td dir="ltr"><?php echo e($voucher->starts_at_fa); ?></td>
                                        <td dir="ltr"><?php echo e($voucher->expires_at_fa); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="<?php echo e(route("voucher.edit",$voucher->id)); ?>">ویرایش کوپن</a>
                                                    <form method="post"
                                                          action="<?php echo e(route("voucher.destroy",$voucher->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("delete"); ?>
                                                        <button class="dropdown-item" type="submit">حذف کوپن</button>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/voucher/list.blade.php ENDPATH**/ ?>