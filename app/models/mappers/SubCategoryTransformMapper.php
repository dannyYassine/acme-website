<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-29
 * Time: 7:18 AM
 */

namespace App\Models\Mappers;

use App\Models\SubCategory;

class SubCategoryTransformMapper implements TransformMapper
{
    public function getTableName(): string
    {
        return SubCategory::TABLE_NAME;
    }

    /**
     * Transforms category to database category object
     * @param $data
     */
    public function toEntity($data)
    {

    }

    /**
     * Transforms  database category object to category
     * @param $data
     */
    public function toModel($data) {

    }

    /**
     * Transforms list of category to database category object
     * @param $data
     */
    public function toEntityList($data)
    {

    }

    /**
     * Transforms list of database category object to category
     * @param $data
     * @return array
     */
    public function toModelList($data) {
        $sub_categories = [];
        foreach ($data as $item) {
            $added = new \Carbon\Carbon($item->created_at);
            array_push($sub_categories, [
                'id' => $item->id,
                'name' => $item->name,
                'category_id' => $item->category_id,
                'slug' => $item->slug,
                'added' => $added
            ]);
        }
        return $sub_categories;
    }
}