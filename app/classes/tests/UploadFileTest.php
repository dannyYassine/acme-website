<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-27
 * Time: 8:08 AM
 */
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Classes\UploadFile;

class UploadFileTest extends TestCase {

    public function testCanReturnFileNameIfNull()
    {
        $uploadFile = new UploadFile();
        $this->assertTrue(is_null($uploadFile->getName()));
    }

    public function testReturnValidFileName()
    {
        $uploadFile = new UploadFile();
        $uploadFile->setName('some.png');
        $fileName = $uploadFile->getName();
        $this->assertTrue(preg_match('/(some-)[a-z-0-9]{0,32}(-png)/', $fileName) === 1);
    }

}