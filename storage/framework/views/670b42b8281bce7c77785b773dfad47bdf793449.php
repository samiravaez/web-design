<?php $dash.='-- '; ?>
<?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($child->id); ?>" <?php echo e((isset($edit_cat) && $edit_cat->parent_id == $child->id)?"selected":''); ?>><i><?php echo e($dash); ?></i><?php echo e($child->name); ?></option>
    <?php if(count($child->children)): ?>
        <?php echo $__env->make('admin.category.subCategoryList-option',['children' => $child->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/category/subCategoryList-option.blade.php ENDPATH**/ ?>