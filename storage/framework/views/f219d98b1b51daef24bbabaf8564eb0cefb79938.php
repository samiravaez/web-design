<?php $__env->startSection('title',"categories"); ?>


<?php $__env->startSection("custom-style"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("vendors/dataTable/dataTables.min.css")); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4><?php echo e((isset($edit_cat))?"ویرایش دسته بندی":"دسته بندی"); ?></h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route("dashboard")); ?>">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">دسته بندی ها</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if(!isset($edit_cat)): ?>
                    <div class="col-md-8 float-left">
                        <div class="card">
                            <div class="card-body">
                                <h4>لیست دسته بندی ها</h4>

                                <hr>
                                <br><br>
                                <table id="example1" class="table table-striped" width="100%">

                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>توضیحات</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </thead>
                                    <?php if(!empty($cats)): ?>
                                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $dash = ''; ?>
                                            <tr>
                                                <td><?php echo e($cat->name); ?></td>
                                                <td><?php echo e($cat->description); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm"
                                                       data-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" type="button"
                                                           href="<?php echo e(route("category.edit",$cat->id)); ?>">ویرایش</a>
                                                        <form method="post"
                                                              action="<?php echo e(route("category.destroy",$cat->id)); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="delete">
                                                            <button class="dropdown-item" type="submit">حذف</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php if(count($cat->children)): ?>
                                                <?php echo $__env->make('admin.category.subCategoryShow',['children' => $cat->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </table>
                                
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-4 float-right">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo e((isset($edit_cat))?"ویرایش دسته بندی":"افزودن دسته بندی"); ?></h6>
                            <form class="needs-validation" method="post"
                                  action="<?php echo e((isset($edit_cat))?route("category.update",$edit_cat->id):route("category.store")); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if(isset($edit_cat)): ?>
                                    <input type="hidden" name="_method" value="PUT">
                                <?php endif; ?>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nameCat">نام</label>
                                        <input type="text" class="form-control" autocomplete="off" autofocus
                                               id="nameCat" name="name" placeholder="نام دسته بندی" required
                                               value="<?php echo e((isset($edit_cat))?$edit_cat->name:''); ?>">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="slugCat">نامک</label>
                                        <input type="text" class="form-control" autocomplete="off" id="slugCat"
                                               name="slug" placeholder="نامک دسته بندی"
                                               value="<?php echo e((isset($edit_cat))?$edit_cat->slug:''); ?>">
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="parent_id">دسته ی والد</label>
                                        <select type="text" name="parent_id" class="form-control" id="parent_id"
                                                required="required"
                                        >
                                            <option value="">بدون والد</option>
                                            <?php if($cats): ?>
                                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $dash = ''; ?>
                                                    <option value="<?php echo e($cat->id); ?>" <?php echo e((isset($edit_cat) && $edit_cat->id == $cat->parent_id)?"selected":''); ?>><?php echo e($cat->name); ?></option>
                                                    <?php if(count($cat->children)): ?>
                                                        <?php echo $__env->make('admin.category.subCategoryList-option',['children' => $cat->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="valid-feedback">
                                            صحیح است!
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="description">توضیحات</label>
                                        <textarea class="form-control" name="description" id="description" cols="30"
                                                  placeholder="توضیحات"><?php echo e(isset($edit_cat)?$edit_cat->description:''); ?></textarea>

                                    </div>
                                </div>

                                <button class="btn btn-primary" name="categoriesAddButton" type="submit">ذخیره
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("custom-script"); ?>
    <script src="<?php echo e(asset("vendors/dataTable/jquery.dataTables.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendors/dataTable/dataTables.bootstrap4.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendors/dataTable/dataTables.responsive.min.js")); ?>"></script>
    <script src="<?php echo e(asset("assets/js/examples/datatable.js")); ?>"></script>


    <?php echo $__env->make("admin.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/category/list.blade.php ENDPATH**/ ?>