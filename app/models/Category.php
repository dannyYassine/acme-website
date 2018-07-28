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

class Category extends Model
{
    use SoftDeletes;

    protected $table = "categories";

    /**
     * Automatically populate column data on new row
     * @var bool
     */
    public $timestamps = true;

    /**
     * Needed to be present in order to mass assignment
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

}