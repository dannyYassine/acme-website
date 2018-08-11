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
use App\Classes\Validators\CategoryValidator;
use App\Classes\Validators\SubCategoryValidator;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Mappers\CategoryTransformMapper;
use App\Models\SubCategory;

class SubCategoryController extends BaseController
{

    public function POST()
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {

                $validator = new SubCategoryValidator();
                $validator->validate(to_array($request));

                $duplicate_subcategory = SubCategory::where('name', $request->name)
                                                    ->where('category_id', $request->category_id)
                                                    ->exists();

                $extra_errors = [];
                if ($duplicate_subcategory)
                {
                    $extra_errors['name'] = array('SubCategory exists');
                }

                $category = Category::where('id', $request->category_id)->exists();

                if (!$category)
                {
                    $extra_errors['name'] = array('Invalide Product category exists');
                }

                if ($validator->hasError() || $duplicate_subcategory || !$category) {
                    $errors = $validator->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;

                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                }

                SubCategory::create([
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                    'slug' => slug($request->name)
                ]);

                echo json_encode(['success' => 'Sucessfully creating subcategory']);
                exit;
            }
            throw new \Exception('Token mismatch');
        }
    }

    public function edit($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $extra_errors = [];

            if (CSRFToken::verifyCSRFToken($request->token, false)) {

                $validator = new SubCategoryValidator();
                $validator->validate(to_array($request));

                $duplicate_subcategory = SubCategory::where('name', $request->name)
                    ->where('category_id', $request->category_id)
                    ->exists();

                $extra_errors = [];
                if ($duplicate_subcategory)
                {
                    $extra_errors['name'] = array('you have not made any changes');
                }

                $category = Category::where('id', $request->category_id)->exists();

                if ($category)
                {
                    $extra_errors['name'] = array('Invalide Product category exists');
                }

                if ($validator->hasError() || $duplicate_subcategory || !$category) {
                    $errors = $validator->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;

                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                }

                SubCategory::where('id', $id)->update(['name' => $request->name, 'category_id' => $request->category_id]);
                echo json_encode(['success' => 'Sucessfully updated subcategory']);
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

                SubCategory::destroy($id);
                Session::add('success', 'SubCategory successfully deleted!');
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