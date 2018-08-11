<?php $__env->startSection('title', 'Product Category'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>

<?php $__env->startSection('content'); ?>

    <div class="categories">

        <div class="categories">
            <div class="row expanded column">
                <div class="column medium-11">
                    <h2>Product Categories</h2>
                    <hr/>
                </div>
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
                        <table class="hover unstriped" data-form="deleteForm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Data Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category['name']); ?></td>
                                    <td><?php echo e($category['slug']); ?></td>
                                    <td><?php echo e($category['added']); ?></td>
                                    <td width="100" class="text-right">
                                    <span class="has-tip top" data-tooltip tabindex="1" title="Add Sub-category">
                                        <a data-open="add-subcategory-<?php echo e($category['id']); ?>"><i class="fa fa-plus"></i></a>
                                    </span>
                                        <span class="has-tip top" data-tooltip tabindex="1" title="Edit Category">
                                        <a data-open="item-<?php echo e($category['id']); ?>"><i class="fa fa-edit"></i></a>
                                    </span>
                                        <span style="display: inline-block;" class="has-tip top" data-tooltip tabindex="1" title="Delete Category">
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

                                        <!-- Add Sub-Category Moal -->
                                        <div class="reveal"
                                             id="add-subcategory-<?php echo e($category['id']); ?>"
                                             data-reveal
                                             data-close-on-click="false"
                                             data-close-on-esc="false"
                                             data-animation-in="scale-in-up"
                                             data-animation-out="scale-out-down">
                                            <div class="notification callout primary">

                                            </div>
                                            <h2>Add Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input id="subcategory-name-<?php echo e($category['id']); ?>"
                                                           type="text"/>
                                                    <div>
                                                        <input id="<?php echo e($category['id']); ?>"
                                                               type="submit"
                                                               data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                               class="button add-subcategory"
                                                               value="Create">
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
    </div>

    <div class="subcategories">

        <div class="categories">
            <div class="row expanded">
                <div class="column medium-11">
                    <h2>SubCategories</h2>
                    <hr/>
                </div>
            </div>
        </div>


        <div class="row expanded">
            <div class="small-12 medium-11 column">
                <?php if(count($subcategories)): ?>
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Data Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($subcategory['name']); ?></td>
                                <td><?php echo e($subcategory['slug']); ?></td>
                                <td><?php echo e($subcategory['added']); ?></td>
                                <td width="100" class="text-right">
                                    <span class="has-tip top" data-tooltip tabindex="1" title="Edit SubCategory">
                                        <a data-open="item-subcategory-<?php echo e($subcategory['id']); ?>"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block;" class="has-tip top" data-tooltip tabindex="1" title="Delete SubCategory">
                                        <form method="POST" action="/admin/product/subcategory/<?php echo e($subcategory['id']); ?>/delete" class="delete-item">
                                            <input hidden name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                            <button type="submit"><i class="fa fa-times delete"></i></button>
                                        </form>
                                    </span>


                                    <!-- Edit SubCategory Moal -->
                                    <div class="reveal"
                                         id="item-subcategory-<?php echo e($subcategory['id']); ?>"
                                         data-reveal
                                         data-close-on-click="false"
                                         data-close-on-esc="false"
                                         data-animation-in="scale-in-up"
                                         data-animation-out="scale-out-down">
                                        <div class="notification callout primary">

                                        </div>
                                        <h2>Edit SubCategory</h2>
                                        <form>
                                            <div class="input-group">
                                                <input id="item-subcategory-name-<?php echo e($subcategory['id']); ?>" type="text" value="<?php echo e($subcategory['name']); ?>" placeholder="Search by name" name="name"/>

                                                <label>Change Category</label>
                                                <select id="item-category-<?php echo e($subcategory['category_id']); ?>">
                                                    <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($category->id === $subcategory['category_id']): ?>
                                                            <option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                        <?php endif; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <div>
                                                    <input id="<?php echo e($subcategory['id']); ?>"
                                                           type="submit"
                                                           data-category-id="<?php echo e($subcategory['category_id']); ?>"
                                                           data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                           class="button update-subcategory"
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
                    <?php echo $subcategory_links; ?>

                <?php else: ?>
                    <h3>You don't have any subcategories</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.deletemodel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>