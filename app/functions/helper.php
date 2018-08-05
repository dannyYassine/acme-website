<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-19
 * Time: 7:57 AM
 * @param $path
 * @param array $data
 */

use Illuminate\Database\Capsule\Manager as Capsule;
use voku\helper\Paginator;
use App\Models\Mappers\TransformMapper;

class ViewTemplate {
    const WELCOME = '/welcome.php';
}

/**
 * @param $path
 * @param array $data
 */
function view($path, array $data = [])
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new \Philo\Blade\Blade($view, $cache);

    echo $blade
            ->view()
            ->make($path, $data)
            ->render();
}

/**
 * Loads file to inject data in it
 * @param $filename
 * @param $data
 * @return string
 */
function make($filename, $data)
{
    // keys are not available variables in scope
    extract($data);

    ob_start();

    // include template
    include(__DIR__ . '/../../resources/views/email/' . $filename);

    // get contents
    $contents = ob_get_contents();

    ob_end_clean();

    return 'Sent!';
}

/**
 * Generate slug from value
 * regular-expressions.info/unicode.html
 * @param $value
 * @return string
 */
function slug($value)
{
    // Remove all characters not in this list: underscores | letters | numbers | whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));
    // replace underscore with a dash
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);
    // remove whitespaces
    return trim($value, '-');
}

/**
 * Converts an stdClass to array
 * @param $stdClass
 * @return mixed
 */
function to_array($stdClass)
{
    return json_decode(json_encode($stdClass), true);
}

function paginate($number_of_records, $total_record, TransformMapper $mapper)
{
    $table_name = $mapper->getTableName();
    $pages = new Paginator($number_of_records, 'p');
    $pages->set_total($total_record);

    $data = Capsule::select("SELECT * from $table_name WHERE deleted_at is NULL ORDER BY created_at DESC " . $pages->get_limit());

    return [$mapper->toModelList($data), $pages->page_links()];
}