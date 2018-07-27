<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-27
 * Time: 7:47 AM
 */

namespace App\Classes;

class UploadFile
{
    protected $filename;
    protected $max_filesize;
    protected $extension;
    protected $path;

    /**
     * Get filename
     * @return mixed
     */
    public function getName()
    {
        return $this->filename;
    }

    /**
     * Setter for filename
     * @param $file
     * @param string $name
     * @return UploadFile
     */
    public function setName($file, $name = ""): self
    {
        if ($name == "") {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }

        $name = strtolower(str_replace(['_', ' '], '-', $name));
        $hash = md5(microtime());
        $ext = $this->fileExtension($file);
        $this->filename = "{$name}-{$hash}-{$ext}";

        return $this;
    }

    /**
     * Returns file extension
     * @param $file
     * @return mixed
     */
    protected function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    public static function fileSize($file)
    {
        $fileObject = new static();
        return $file > $fileObject->max_filesize ? true : false;
    }
}