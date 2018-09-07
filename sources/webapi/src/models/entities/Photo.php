<?php
    /*
 * File: Photo.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */


require_once('Entities.php');
/**
 * @author Dylan <bonin_d@etna-alternance.net>
 * Class Photo :
 * This class represents a 'photo' from the database
 */
class Photo extends Entities implements JsonSerializable
{

    private $_title;
    private $_path;
    private $_description;
    private $_hobby;

    /**
     * Default constructor empty
     */
    public function __construct()
    {

    }

    /**
     * create
     *
     * @param Array like $stdClass -> return of PDO 
     * @return Object Photo
     */
    public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $photo = new Photo();
        $photo->setId($stdClass->id);
        $photo->setTitle($stdClass->title);
        $photo->setPath($stdClass->path);
        $photo->setDescription($stdClass->description);
        $photo->setHobby(HobbyDao::get($stdClass->id_hobbyactivity));
        return $photo;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getPath()
    {
        return $this->_path;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getHobby()
    {
        return $this->_hobby;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function setPath($path)
    {
        $this->_path = $path;
    }

    public function setDescription($description)
    {
        $this->_description = $description;
    }

    public function setHobby($hobby)
    {
        $this->_hobby = $hobby;
    }

    /**
     * toArray declared in Entites
     *
     * Take value of members and create an array 'memberName' => value
     * @return array
     */
    public function toArray()
    {
        $array = array(
            'id' => $this->_id,
            'title' => $this->_title,
            'path' => $this->_path,
            'desciption' => $this->_description,
            'hobby' => $this->_hobby->toArray()
        );
        return $array;
    }

    public function toString()
    {
        return __class__;
    }

    public function jsonSerialize() 
    {
        return $this->toArray();
    }
}

?>