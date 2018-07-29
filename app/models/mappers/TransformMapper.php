<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-29
 * Time: 7:35 AM
 */

namespace App\Models\Mappers;

interface TransformMapper {
    public function getTableName(): string;
    public function toEntity($data);
    public function toModel($data);
    public function toEntityList($data);
    public function toModelList($data);
}