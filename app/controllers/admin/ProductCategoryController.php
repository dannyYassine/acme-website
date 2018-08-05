<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 11:33 AM
 */

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Classes\Validators\CategoryValidator;
use App\Models\Category;
use App\Models\Mappers\CategoryTransformMapper;

class ProductCategoryController
{
    public $categories;
    public $links;

    public function __construct()
    {
        $this->fetchCategories();
    }

    public function show()
    {
        return view(
            'admin/products/categories',
            ['categories' => $this->categories, 'links' => $this->links]
        );
    }

    public function POST()
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {

                $validator = new CategoryValidator();
                $validator->validate(to_array($request));

                if ($validator->hasError()) {
                    $errors = $validator->getErrorMessages();
                    return view(
                        'admin/products/categories',
                        ['categories' => $this->categories, 'links' => $this->links, 'errors' => $errors]);
                }

                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);

                $this->fetchCategories();
                return view(
                    'admin/products/categories',
                    ['categories' => $this->categories, 'links' => $this->links, 'success' => 'Category created']);
            }
            throw new \Exception('Token mismatch');
        }
    }

    public function edit($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token, false)) {

                $validator = new CategoryValidator();
                $validator->validate(to_array($request));

                if ($validator->hasError()) {
                    $errors = $validator->getErrorMessages();
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                }

                Category::where('id', $id)->update(['name' => $request->name]);
                echo json_encode(['success' => 'Record saved successfully']);
                exit;
            }
            throw new \Exception('Token mismatch');
        }
    }

    public function DELETE($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token, false)) {

                Category::destroy($id);
                Session::add('success', 'Category successfully deleted!');
                Redirect::to('/admin/product/categories');
            }
            throw new \Exception('Token mismatch');
        }
    }

    private function fetchCategories()
    {
        $total = Category::all()->count();
        list($this->categories, $this->links) = paginate(4, $total, new CategoryTransformMapper());
    }
}