<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 11:34 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    CONST TABLE_NAME = 'sub_categories';

    /**
     * Table Name
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Will ignore columns with deleted_at NOT NULL
     */
    use SoftDeletes;

    /**
     * Automatically populate column data on new row
     * As set to true, all dates fields are Carbon objects
     * @var bool
     */
    public $timestamps = true;

    /**
     * Needed to be present in order to mass assignment
     * @var array
     */
    protected $fillable = ['name', 'slug', 'category_id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get all of the posts for the user.
     */
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

}