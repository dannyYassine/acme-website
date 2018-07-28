<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 11:33 AM
 */

namespace App\Controllers\Admin;

use App\Models\Category;

class ProductCategoryController
{
    public function show()
    {
        $categories = Category::all();
        var_dump($categories);
        exit;
    }

    public function store()
    {

    }
}