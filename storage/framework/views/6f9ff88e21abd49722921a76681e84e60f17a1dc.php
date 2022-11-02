<ul>
    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php echo e($child->name); ?>

            <?php if(count($child->children)): ?>
                <?php echo $__env->make('admin.category.manageChild',['children' => $child->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/category/manageChild.blade.php ENDPATH**/ ?>