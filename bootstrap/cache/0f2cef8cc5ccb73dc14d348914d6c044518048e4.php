<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="dashboard">
    <div class="row expanded">
        <h2>Dashboard</h2>
    </div>
    <form action="/admin" method="post" enctype="multipart/form-data">
        <input name="product" value="testing">
        <input type="file" name="image">
        <input type="submit" value="GO" name="submit">
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>