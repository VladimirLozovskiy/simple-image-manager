<?php

namespace model;

class  imageModel
{

    /**
     * image's id
     *
     * @var
     */
    protected $id;

    /**
     * image's fileName
     *
     * @var
     */
    protected $fileName;

    /**
     * image's size
     *
     * @var
     */
    protected $size;

    /**
     * image's date
     *
     * @var
     */
    protected $date;

    /**
     * set image's id
     *
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * return image's id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set image's fileName
     *
     * @param $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * return image's fileName
     *
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * set image's size
     *
     * @param $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * return image's size
     *
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * set image's date
     *
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * return image's date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

}