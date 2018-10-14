<?php

/**
* 
*/
class BookingDAO
{
	
	public static function get($id) {
		$params = array(
            'id' => $id
        );
        $query = 'SELECT * FROM booking WHERE id = :id';
        $result = Database::getInstance()->query($query, $params);
        if ($result) {
            return BookingDao::create($result[0]);
        }
        return null;
    }

    public static function getAll()
    {
        $bookings = array();
        $query = 'SELECT * FROM booking';
        $result = Database::getInstance()->query($query);
        foreach ($result as $row) {
            $bookings[] = Booking::create($row);
        }
        return $bookings;
    }

    public static function add($booking)
    {
        $params = array(
            'n_people' => $booking->getGrade(),
            'user_id' => $booking->getUser_Id()->getId(),
            'activity_id' => $booking->getActivity_Id()->getId()

        );
        $query = 'INSERT INTO booking (n_people, user_id, activity_id)
            VALUES (:n_people, :user_id, :activity_id)';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function update($booking)
    {
        $params = array(
            'id' => $post->getId(),
            'n_people' => $booking->getGrade(),
            'user_id' => $booking->getUser_Id()->getId(),
            'activity_id' => $booking->getActivity_Id()->getId()
        );
        $query = 'UPDATE booking SET n_people = :n_people, user_id = :user_id, activity_id = :activity_id WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function delete($id)
    {
        if ($id == null) {
            return false;
        }
        $params = array(
            'id' => $id
        );
        $query = 'DELETE FROM booking WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }
}







































?>