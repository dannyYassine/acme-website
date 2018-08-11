<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-08-11
 * Time: 1:53 PM
 */

namespace App\Controllers;

interface HttpInterface {
    public function GET();
    public function POST();
    public function PUT();
    public function DELETE();
}