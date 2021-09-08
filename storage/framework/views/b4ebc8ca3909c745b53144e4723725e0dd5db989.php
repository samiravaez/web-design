<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <ul>
            
            
            
            

            <li><?php echo e($errors->first()); ?></li>


        </ul>
    </div>
<?php endif; ?><?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/auth/errors.blade.php ENDPATH**/ ?>