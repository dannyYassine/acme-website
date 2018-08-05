<?php $__env->startSection('title', 'Product Category'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>

<?php $__env->startSection('content'); ?>

    <div class="categories">
        <div class="row expanded">
            <h2>Product Categories</h2>
        </div>
    </div>

    <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row expanded">
        <div class="small-12 medium-6 column">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="input-group-field" placeholder="Search by name">
                    <div class="input-group-field">
                        <input type="submit" class="button" value="Search">
                    </div>
                </div>
            </form>
        </div>

        <div class="small-12 medium-5 column end">
            <form action="/admin/product/categories" method="post">
                <div class="input-group">
                    <input hidden name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <input type="text" class="input-group-field" placeholder="Search by name" name="name" placeholder="Category name">
                    <div class="input-group-field">
                        <input type="submit" class="button" value="Create">
                    </div>
                </div>
            </form>
        </div>

        <div class="row expanded">
            <div class="small-12 medium-11 column">
                <?php if(count($categories)): ?>
                    <table class="hover" data-form="deleteForm">
                        <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category['name']); ?></td>
                                <td><?php echo e($category['slug']); ?></td>
                                <td><?php echo e($category['added']); ?></td>
                                <td width="100" class="text-right">
                                    <span>
                                        <a data-open="item-<?php echo e($category['id']); ?>"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block;">
                                        <form method="POST" action="/admin/product/categories/<?php echo e($category['id']); ?>/delete" class="delete-item">
                                            <input hidden name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                            <button type="submit"><i class="fa fa-times delete"></i></button>
                                        </form>
                                    </span>


                                    <!-- Edit Category Moal -->
                                    <div class="reveal"
                                         id="item-<?php echo e($category['id']); ?>"
                                         data-reveal
                                         data-close-on-click="false"
                                         data-close-on-esc="false"
                                         data-animation-in="scale-in-up"
                                         data-animation-out="scale-out-down">
                                        <div class="notification callout primary">

                                        </div>
                                        <h2>Edit Category</h2>
                                        <form>
                                            <div class="input-group">
                                                <input id="item-name-<?php echo e($category['id']); ?>" type="text" name="name" value="<?php echo e($category['name']); ?>" placeholder="Search by name" name="name"/>
                                                <div>
                                                    <input id="<?php echo e($category['id']); ?>"
                                                           type="submit"
                                                           data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                           class="button update-category"
                                                           value="Update">
                                                </div>
                                            </div>
                                        </form>
                                        <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h3>You don't have any categories</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.deletemodel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>