<?php $__env->startSection('title',"Service"); ?>

<?php $__env->startSection("custom-style"); ?>
    <link rel="stylesheet" href="<?php echo e(asset("vendors/select2/css/select2.min.css")); ?>" type="text/css">
    <style>
        input.form-control {
            direction: ltr;
            text-align: center;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4><?php echo e((isset($edit_product))?"ویرایش محصول":"افزودن محصول"); ?></h4>
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
                        <h6 class="card-title"><?php echo e((isset($edit_product))?"ویرایش محصول ".$edit_product->name:"ایجاد محصول"); ?></h6>
                        <form class="needs-validation"
                              action="<?php echo e((isset($edit_product))?route("product.update",$edit_product->id):route("product.store")); ?>"
                              method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($edit_product)): ?>
                                <?php echo method_field("patch"); ?>
                            <?php endif; ?>
                            <div class="form-row mb-3">
                                <div class="col-md-3 mb-3">
                                    <label for="name">نام</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="نام محصول"
                                           value="<?php echo e(isset($edit_product)?$edit_product->name:''); ?>"
                                           required="required">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="category">دسته بندی</label>
                                    <select name="cat_id" class="form-control" id="category" autocomplete="off"
                                            required="required">
                                        <option value="" disabled="disabled">دسته ی محصول را انتخاب کنید</option>
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
                                <div class="col-md-3 mb-3">
                                    <label for="price">قیمت (به تومان)</label>
                                    <input type="text" name="price" class="form-control" id="price" required="required"
                                           placeholder="قیمت (به تومان)"
                                           value="<?php echo e(isset($edit_product)?$edit_product->price:''); ?>">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <fieldset>
                                        <p>نوع تخفیف: </p>
                                        <input type="radio" name="discount_type" id="constant"
                                               value="0"
                                               checked
                                               <?php echo e(isset($edit_product)?($edit_product->discount_type == 0 ? "checked" : "") :''); ?>

                                               onclick="constantOrPercent()"> تومان
                                        
                                        <input type="radio" name="discount_type" id="percent"
                                               value="1"
                                               <?php echo e(isset($edit_product)?($edit_product->discount_type == 1 ? "checked" : "") :''); ?>

                                               onclick="constantOrPercent()"> درصد
                                    </fieldset>
                                </div>

                                <div class="col-md-4 mb-4" style="display: none" id="constant_discount">
                                    <label for="constant_discount">میزان تخفیف (به تومان)</label>
                                    <input type="text" name="discount_value" class="form-control"
                                           placeholder="میزان تخفیف (به تومان)"
                                           value="<?php echo e(isset($edit_product)?$edit_product->discount_value:''); ?>">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4" style="display: none" id="percent_discount">
                                    <label for="percent_discount">میزان تخفیف (به درصد)</label>
                                    <input type="number" name="discount_value" class="form-control"
                                           placeholder="میزان تخفیف (به درصد)"
                                           value="<?php echo e(isset($edit_product)?$edit_product->discount_value:''); ?>">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="preview_link">لینک پیش نمایش</label>
                                    <input type="text" name="preview_link" class="form-control" id="preview_link"
                                           autocomplete="off"
                                           placeholder="لینک پیش نمایش محصول"
                                           value="<?php echo e(isset($edit_product)?$edit_product->preview_link:''); ?>"
                                           dir="ltr">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="description">توضیحات</label>
                                    <textarea class="form-control" name="description" id="description"
                                              placeholder="توضیحات"><?php echo e(isset($edit_product)?$edit_product->description:''); ?></textarea>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="image">تصویر محصول</label>
                                    <input type="file" name="image" class="form-control" id="image" autocomplete="off"
                                           
                                           value="<?php echo e(isset($edit_product)?$edit_product->image:''); ?>"
                                           dir="ltr">
                                    <br>
                                    <img src="/images/<?php if(isset($edit_product)): ?><?php echo e($edit_product->image); ?> <?php endif; ?>"
                                         id="imageLoad" width="300px" alt="تصویر یافت نشد">
                                    <div class="valid-feedback">
                                        صحیح است!
                                    </div>
                                </div>


                                <div class="col-12 mb-3">
                                    <button class="btn btn-primary float-left" name="updateServiceData" id="submit-all"
                                            type="submit">
                                        <?php echo e((isset($edit_product))?"ویرایش محصول":"افزودن محصول"); ?>

                                    </button>
                                </div>
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
    <script src="<?php echo e(asset('vendors/select2/js/select2.min.js')); ?>"></script>
    <script>
        function constantOrPercent() {
            if (document.getElementById('constant').checked) {
                document.getElementById('constant_discount').style.display = 'block';
                document.getElementById('percent_discount').style.display = 'none';
            } else if (document.getElementById('percent').checked) {
                document.getElementById('percent_discount').style.display = 'block';
                document.getElementById('constant_discount').style.display = 'none';
            }

        }

        image.onchange = evt => {
            const [file] = image.files;
            if (file) {
                imageLoad.src = URL.createObjectURL(file)
            }
        };

        //
        // function getChild(parent_id)
        // {
        //     var result={},objectlength;
        //     jQuery.ajax({
        //         url: "/admin/products/categories/"+parent_id+".json",
        //         type: "GET",
        //         data: {"parent_id" : parent_id},
        //         dataType: "html",
        //         success: function(data) {
        //
        //             // jQuery("#category").find('option').remove();
        //             result = JSON.parse(data);
        //             objectlength =result.length;
        //             for(var i=0; i<objectlength; i++)
        //             {
        //                 jQuery("#category").append('<option value="result[i].id">'+ '&nbsp &nbsp'+result[i].name  +'</option>');
        //             }
        //             console.log(name);
        //             console.log(objectlength);
        //             // console.log(data)
        //         }
        //     });
        // }
        constantOrPercent()
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/product/create.blade.php ENDPATH**/ ?>