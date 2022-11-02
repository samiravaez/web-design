<?php $__env->startSection('title',"محصولات"); ?>

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
            <h4>لیست محصولات</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route("dashboard")); ?>">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">محصولات</li>
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
                        <h6 class="card-title">محصولات</h6>
                        <p class="card-title"><a href="<?php echo e(route('product.create')); ?>">ایجاد محصول</a></p>
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">نام محصول</th>
                                    <th>دسته</th>
                                    <th>توضیحات</th>
                                    <th>قیمت (به تومان)</th>
                                    <th>قیمت با اعمال کد تخفیف (به تومان)</th>
                                    <th>لینک پیش نمایش</th>
                                    <th>تصویر محصول</th>
                                    <th>گزینه ها</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e(isset($product->category->name)?
                          $product->category->name:''); ?>

                                        </td>
                                        <td><?php echo e($product->description); ?></td>
                                        
                                        
                                        
                                        
                                        
                                        <td><?php echo e($product->price); ?></td>
                                        <?php if($product->discount_type == 0): ?>
                                            <td dir="ltr"><?php echo e(($product->price - $product->discount_value) > 0 ? $product->price - $product->discount_value
                                             : 0); ?></td>
                                        <?php elseif($product->discount_type == 1): ?>
                                            <td dir="ltr"><?php echo e(($product->price * $product->discount_value) > 0 ? $product->price * $product->discount_value
                                             : 0); ?></td>
                                        <?php else: ?>
                                            <td>کد تخفیفی برای این محصول وجود ندارد.</td>
                                        <?php endif; ?>
                                        <td dir="ltr"><?php echo e($product->preview_link); ?></td>

                                        <td dir="ltr"><?php if($product->image): ?><img src="/images/<?php echo e($product->image); ?>"
                                                                               width="200px">
                                            <?php endif; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" type="button"
                                                       href="<?php echo e(route("product.edit",$product->id)); ?>">ویرایش محصول</a>
                                                    <form method="post"
                                                          action="<?php echo e(route("product.destroy",$product->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("delete"); ?>
                                                        <button class="dropdown-item" type="submit">حذف محصول</button>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/product/list.blade.php ENDPATH**/ ?>