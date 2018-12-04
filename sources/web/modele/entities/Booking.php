<?php

require_once('Entities.php');

/**
* 
*/
class Booking extends Entities implements JsonSerializable
{

	private $_user_id;
    private $_n_people;
    private $_date;
    private $_hour;
    private $_minute;
	private $_activity_id;
	
	public function __construct()
	{

	}

	public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $booking = new Booking();
        $booking->setUser_Id($stdClass->user_id);
        $booking->setN_People($stdClass->n_people);  
        $booking->setDate($stdClass->date);
        $booking->setHour($stdClass->hour);
        $booking->setMinute($stdClass->minute);      
        $booking->setActivity_Id($stdClass->activity_id);
        return $booking;
    }
    public function getDate(){
        return $this->_date;    
    }

    public function setDate($date){
        $this->_date = $date;
    }

    public function getN_People()
    {
        return $this->_n_people;
    }

    public function getUser_Id()
    {
        return $this->_user_id;
    }

    public function getActivity_Id()
    {
        return $this->_activity_id;
    }

    public function setN_People($n_people)
    {
        $this->_n_people = $n_people;
    }

    public function setUser_Id($id_user)
    {
        $this->_user_id = $id_user;
    }

    public function setActivity_Id($id_hobbyactivity)
    {
        $this->_activity_id = $id_hobbyactivity;
    }

    public function toArray()
    {
        $array = array(
            'id' => $this->_id,
            'user_id' => $this->_user_id,
            'n_people' => $this->_n_people,
            'date' => $this->date,
            'hour' => $this->hour,
            'minute' => $this->minute,
            'activity_id' => $this->_activity_id
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
     * Get the value of _hour
     */ 
    public function getHour()
    {
        return $this->_hour;
    }

    /**
     * Set the value of _hour
     *
     * @return  self
     */ 
    public function setHour($_hour)
    {
        $this->_hour = $_hour;

        return $this;
    }

    /**
     * Get the value of _minute
     */ 
    public function getMinute()
    {
        return $this->_minute;
    }

    /**
     * Set the value of _minute
     *
     * @return  self
     */ 
    public function setMinute($_minute)
    {
        $this->_minute = $_minute;

        return $this;
    }
}



?>