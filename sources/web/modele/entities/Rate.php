<?php
    /*
 * File: Rate.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

require_once('Entities.php');
/**
 * @author Dylan <bonin_d@etna-alternance.net>
 * Class Rate :
 * This class represents a 'rate' from the database
 */
class Rate extends Entities implements JsonSerializable
{

    private $_label;
    private $_id_activity;

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
     * @return Object Rate
     */
    public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $rate = new Rate();
        $rate->setId($stdClass->id);
        $rate->setLabel($stdClass->label);
        $rate->setId_activity($stdclass->id_activity);
        return $rate;
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
            'label' => $this->_label,
            'id_activity' => $this->_id_activity
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

    /**
     * Get the value of _id_activity
     */ 
    public function getId_activity()
    {
        return $this->_id_activity;
    }

    /**
     * Set the value of _id_activity
     *
     * @return  self
     */ 
    public function setId_activity($_id_activity)
    {
        $this->_id_activity = $_id_activity;

        return $this;
    }
}
?>