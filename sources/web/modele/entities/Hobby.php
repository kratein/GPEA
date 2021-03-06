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
    private $_cover;
    private $_slogan;
    private $_price;
    private $_max_n_people;

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
    //remplir le tableau de tag 
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
        $hobby->setOlder($stdClass->min_older);
        $hobby->setStreet($stdClass->street);
        $hobby->setZipCode($stdClass->zip_code);
        $hobby->setCity($stdClass->city);
        $hobby->setCover($stdClass->cover);
        $hobby->setSlogan($stdClass->slogan);
        $hobby->setPrice($stdClass->price);
        $hobby->setMax_n_people($stdClass->max_n_people);
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

    public function getCover()
    {
        return $this->_cover;
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

    public function setCover($cover)
    {
        $this->_cover = $cover;
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
            'cover' => $this->_cover,
            'tags' => $tags,
            'slogan' => $this->_slogan,
            'price' => $this->_price,
            'max_n_people' => $this->_max_n_people
        );
        return $array;
    }

    public function toString()
    {
        return __class__;
    }

    public function addTag($tag) {
        if ($this->_tags == null) {
            $this->_tags = array();
        }
        array_push($this->_tags, $tag);
    }

    public function jsonSerialize() 
    {
        return $this->toArray();
    }

    public function shortDescription()
    {
        return substr($this->_description, 0, 150);
    }

    /**
     * Set the value of _slogan
     *
     * @return  self
     */ 
    public function setSlogan($_slogan)
    {
        $this->_slogan = $_slogan;

        return $this;
    }

    public function getAddress()
    {
        return $this->_street."\n".$this->getZipCode()." ".$this->getCity(); 
    }

    /**
     * Get the value of _slogan
     */ 
    public function getSlogan()
    {
        return $this->_slogan;
    }

    /**
     * Get the value of _price
     */ 
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * Set the value of _price
     *
     * @return  self
     */ 
    public function setPrice($_price)
    {
        $this->_price = $_price;

        return $this;
    }

    /**
     * Get the value of _max_n_people
     */ 
    public function getMax_n_people()
    {
        return $this->_max_n_people;
    }

    /**
     * Set the value of _max_n_people
     *
     * @return  self
     */ 
    public function setMax_n_people($_max_n_people)
    {
        $this->_max_n_people = $_max_n_people;

        return $this;
    }
}

?>