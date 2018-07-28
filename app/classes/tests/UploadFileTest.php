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

    public function testShouldReturnValidFileName()
    {
        $fileNamePattern = '/(some-)[a-z0-9]{32}(-png)/';
        $uploadFile = new UploadFile();

        $uploadFile->setName('some.png');
        $fileName = $uploadFile->getName();

        $this->assertTrue(preg_match($fileNamePattern, $fileName) === 1);
    }


    public function testFileSizeShouldReturnFalseWhenFileIsBelowMaximum()
    {
        $uploadFile = new UploadFile();
        $this->assertFalse($uploadFile->fileSize('some.png'));
    }

    public function testFileSizeShouldReturnTrueWhenFileIsAboveMaximum()
    {
        $uploadFile = new UploadFile();
        $this->assertTrue($uploadFile->fileSize(1));
    }

}