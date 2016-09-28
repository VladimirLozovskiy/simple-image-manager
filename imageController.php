<?php

namespace  controller;

require_once 'imageModel.php';
require_once 'enterDb.php';

use \database\enterDB as DB;
use \model\imageModel as ImageModel;

class imageController extends ImageModel
{
    /**
     * variable for connection to database
     *
     * @var
     */
    protected $db1;

    /**
     * imageController constructor for connection to database
     */
    function __construct()
    {
        $dbObj     = new DB();
        $this->db1 = $dbObj->connect();

        if (!file_exists('uploadedImages')) {
            mkdir('uploadedImages', 0777, true);
        }
        // in case if client accidentally change permission
        chmod("uploadedImages", 0777);
    }

    /**
     * function for uploading images
     *
     * @param $file
     * @return mixed
     */
    public function uploadImage($file)
    {
        $directory = "uploadedImages/" . basename($file['image']['name']);
        $date = date("l dS F of   h:i:s A");

        parent::setFileName($file['image']['name']);
        parent::setSize($file['image']['size']);
        parent::setDate($date);

        $allowed_filetypes = array('.jpg', '.jpeg', '.gif', '.png');
        $ext = substr(parent::getFileName(), strpos(parent::getFileName(), '.'), strlen(parent::getFileName()) - 1);

        if (!in_array($ext, $allowed_filetypes)) {
            return "<h2>Warning: You can upload only .jpeg, .gif and .png ! Change file and try again please.</h2>";
        } else {

            if (parent::getSize() < 5 * 1024 * 1024) {
                $stmt = $this->db1->prepare("INSERT INTO `images` (`file_name`, `size`, `date`) VALUES (:image, :size, :date)");
                $stmt->execute(array('image' => parent::getFileName(), 'size' => parent::getSize(), 'date' => parent::getDate()));

                if (move_uploaded_file($file['image']['tmp_name'], $directory)) {
                    header('Location: index.php');
                } else {
                    return "<h1> Uploading failed </h1>";
                }
            } else {
                return "<h2> Warning: File's size is more then 5Mb, please chose another file! </h2>";
            }
        }
        return null;
    }

    /**
     * function for deleting image
     *
     * @param $id
     */
    public function deleteImage($id)
    {
        parent::setId($id);

        $sql2p = $this->db1->prepare("DELETE FROM `images` WHERE `id`= ? ");
        $sql2p->execute(array(parent::getId()));
    }
}
