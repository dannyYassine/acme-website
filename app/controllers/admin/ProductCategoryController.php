<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 11:33 AM
 */

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Classes\Validators\CategoryValidator;
use App\Models\Category;
use App\Models\Mappers\CategoryTransformMapper;

class ProductCategoryController
{
    public function show()
    {
        $total = Category::all()->count();
        $object = new Category();

        list($categories, $links) = paginate(2, $total, new CategoryTransformMapper());

        return view('admin/products/categories', ['categories' => $categories, 'links' => $links]);
    }

    public function POST()
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {

                $validator = new CategoryValidator();
                $validator->validate(to_array($request));

                if ($validator->hasError()) {
                    var_dump($validator->getErrorMessages());
                    exit;
                }

                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);

                $categories = Category::all();
                $message = 'Category created';
                return view('admin/products/categories', ['categories' => $categories, 'message' => $message]);
            }
            throw new \Exception('Token mismatch');
        }
    }
}