<?php $dash.='-- '; ?>
<?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr><td><i><?php echo e($dash); ?></i><?php echo e($child->name); ?></td>
        <td><?php echo e($child->description); ?></td>
        
<td>

        <a href="#" class="btn btn-sm"
           data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" type="button" href="<?php echo e(route("category.edit",$child->id)); ?>">ویرایش</a>
            <form method="post" action="<?php echo e(route("category.destroy",$child->id)); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="delete">
                <button class="dropdown-item" type="submit">حذف</button>
            </form>
        </div>
        </td>
    </tr>

    <?php if(count($child->children)): ?>
        <?php echo $__env->make('admin.category.subCategoryShow',['children' => $child->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/category/subCategoryShow.blade.php ENDPATH**/ ?>