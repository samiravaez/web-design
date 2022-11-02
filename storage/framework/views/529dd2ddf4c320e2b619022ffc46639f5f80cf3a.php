<?php if(session('status')): ?>
<script>
    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200,
        positionClass: "toast-top-center"
    };
    toastr.success("<?php echo e(session('status')); ?>");
</script>
<?php endif; ?>
<?php /**PATH C:\Users\SamiraVz\Desktop\web-design\resources\views/admin/flash.blade.php ENDPATH**/ ?>