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
    protected $max_filesize = 1;
    protected $extension;
    protected $path;

    public function __construct($fileSize = 0)
    {
        $this->max_filesize = $fileSize;
    }

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
    public function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    public static function fileSize($file)
    {
        $fileObject = new static();
        return $file > $fileObject->max_filesize ? true : false;
    }

    /**
     * Validate file upload
     * @param $file
     * @return bool
     */
    public static function isImage($file)
    {
        $fileObject = new static();
        $ext = $fileObject->fileExtension($file);
        $validExtension = array('jpg', 'jpeg', 'png', 'bmp', 'gif');

        if (in_array(strtolower($ext), $validExtension)) {
            return false;
        }

        return true;
    }

    /**
     * Get the path where the file was uploaded to
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Move the file to intended location
     * @param $temp_path
     * @param $folder
     * @param $file
     * @param $new_filename
     * @return null|static
     */
    public static function move($temp_path, $folder, $file, $new_filename)
    {
        $fileObject = new static();
        $ds = DIRECTORY_SEPARATOR;

        $fileObject->setName($file, $new_filename);
        $file_name = $fileObject->getName();

        if (!is_dir($file_name)) {
            mkdir($folder, 0777, true);
        }

        $fileObject->path = "${folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH."{$ds}public{$ds}$fileObject->path";

        if (move_uploaded_file($temp_path, $absolute_path)) {
            return $fileObject;
        }

        return null;
    }
}