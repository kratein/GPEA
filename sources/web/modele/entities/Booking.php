<?php

require_once('Entities.php');

/**
* 
*/
class Booking extends Entities implements JsonSerializable
{

	private $_user_id;
	private $_n_people;
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
        $booking->setN_People(2);
        $booking->setUser_Id(1);
        $booking->setActivity_Id(1);
        return $booking;
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
            'npeople' => $this->_n_people,
            'user' => $this->_user->toArray(),
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