<?php
    /*
 * File: Tag.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

require_once('Entities.php');
/**
 * @author Dylan <bonin_d@etna-alternance.net>
 * Class Tag :
 * This class represents a 'tag' from the database
 */
class Tag extends Entities implements JsonSerializable
{

    private $_label;

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
     * @return Object Tag
     */
    public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $tag = new Tag();
        $tag->setId($stdClass->id);
        $tag->setLabel($stdClass->label);
        return $tag;
    }

    public function getLabel()
    {
        return $this->_label;
    }

    public function setLabel($label)
    {
        $this->_label = $label;
    }

    /**
     * toArray declared in Entities
     *
     * Take value of members and create an array 'memberName' => value
     * @return array
     */
    public function toArray()
    {
        $array = array(
            'id' => $this->_id,
            'label' => $this->_label
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