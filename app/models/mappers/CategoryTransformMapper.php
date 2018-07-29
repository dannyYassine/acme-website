<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-29
 * Time: 7:18 AM
 */

namespace App\Models\Mappers;

use App\Models\Category;

class CategoryTransformMapper implements TransformMapper
{
    public function getTableName(): string
    {
        return Category::TABLE_NAME;
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
        $categories = [];
        foreach ($data as $item) {
            $added = new \Carbon\Carbon($item->created_at);
            array_push($categories, [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'added' => $added
            ]);
        }
        return $categories;
    }
}