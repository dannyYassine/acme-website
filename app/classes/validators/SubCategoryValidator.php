<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 5:48 PM
 */
namespace App\Classes\Validators;

class SubCategoryValidator extends BaseValidateRequest
{
    public function validate($data)
    {
        $rules = [
            'name' => ['required' => true, 'maxLength' => 5, 'string' => true],
            'category_id' => ['required' => true]
        ];
        parent::abide($data, $rules);
    }
}