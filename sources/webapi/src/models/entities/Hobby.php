<?php
    /*
 * File: Hobby.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */


require_once('Entities.php');

/**
 * @author Dylan <bonin_d@etna-alternance.net>
 * Hobby class :
 * This class represents a "HobbyActivity" from the database
 */
class Hobby extends Entities implements JsonSerializable
{

    private $_label;
    private $_description;
    private $_web_site;
    private $_min_older;
    private $_street;
    private $_zip_code;
    private $_city;
    private $_tags;

    /**
     * Default constructor empty
     */
    public function __construct()
    {

    }

    /**
     * Create
     *  
     * @static
     * @param Array like $stdClass -> return of PDO 
     * @return Object Hobby
     */
    public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $hobby = new Hobby();
        $hobby->setId($stdClass->id);
        $hobby->setLabel($stdClass->label);
        $hobby->setDescription($stdClass->description);
        $hobby->setWebSite($stdClass->web_site);
        $hobby->setOlder($stdClass->minimum_older);
        $hobby->setStreet($stdClass->street);
        $hobby->setZipCode($stdClass->zip_code);
        $hobby->setCity($stdClass->city);
        $hobby->setTags(array());
        return $hobby;
    }

    public function getLabel()
    {
        return $this->_label;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getWebSite()
    {
        return $this->_web_site;
    }

    public function getOlder()
    {
        return $this->_min_older;
    }

    public function getStreet()
    {
        return $this->_street;
    }

    public function getZipCode()
    {
        return $this->_zip_code;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function getTags()
    {
        return $this->_tags;
    }

    public function setTags($tags)
    {
        $this->_tags = $tags;
    }

    public function setLabel($label)
    {
        $this->_label = $label;
    }

    public function setDescription($description)
    {
        $this->_description = $description;
    }

    public function setWebSite($webSite)
    {
        $this->_web_site = $webSite;
    }

    public function setOlder($older)
    {
        $this->_min_older = $older;
    }

    public function setStreet($street)
    {
        $this->_street = $street;
    }

    public function setZipCode($zipCode)
    {
        $this->_zip_code = $zipCode;
    }

    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * toArray declared in Entities
     *
     * Take value of members and create an array 'memberName' => value
     * @return array
     */
    public function toArray()
    {
        $tags = array();
        if($this->_tags != null) {
            foreach($this->_tags as $tag) {
                array_push($tags, $tag->toArray());
            }
        }
        $array = array(
            'id' => $this->_id,
            'label' => $this->_label,
            'description' => $this->_description,
            'web_site' => $this->_web_site,
            'minimum_older' => $this->_min_older,
            'street' => $this->_street,
            'zip_code' => $this->_zip_code,
            'city' => $this->_city,
            'tags' => $tags
        );
        return $array;
    }

    public function toString()
    {
        return __class__;
    }

    public function addTag($tag) {
        array_push($this->_tags(), $tag);
    }

    public function jsonSerialize() 
    {
        return $this->toArray();
    }
}

?>