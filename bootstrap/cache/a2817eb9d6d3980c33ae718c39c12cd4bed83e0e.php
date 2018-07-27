<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <script src="https://use.fontawesome.com/e8aff9ba76.js"></script>
</head>
<body>

<?php echo $__env->make('includes.side-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="off-canvas-content admin_title_bar" data-off-canvas-content>
    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvasLeft"></button>
            <span class="title-bar-title"><?php echo e(getenv('APP_NAME')); ?></span>
        </div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>

</div>

<script src="/js/all.js" type="text/javascript"></script>
</body>
</html>