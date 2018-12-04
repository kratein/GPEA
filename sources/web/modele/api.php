<?php
require_once ('entities/Tag.php');
require_once ('entities/Hobby.php');
require_once ('entities/Photo.php');
require_once ('entities/User.php');
require_once ('entities/Booking.php');

function GetTagsObject() {
    $json = file_get_contents("http://localhost:8080/api/tag/all");
    $json = json_decode($json); 
    $tags = array();
    foreach ($json as $tag) {
        $tags[] = Tag::create($tag);
    }
    return $tags;
}

function GetUserByEmail($email){
    $json = file_get_contents("http://localhost:8080/api/tag/all");
    $json = json_decode($json); 
    $tags = array();
}

function Connect($email, $password) {
    $api_request_url = " ";
    $data = array (
        'email' => $email,
        'password' => $password
    );
    $ch = curl_init();
    $options = array(
        CURLOPT_URL            => $api_request_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 12000,
        CURLOPT_TIMEOUT        => 12000,
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_POSTFIELDS     => json_encode($data),
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => array('Content-Type: application/json')
    );
    curl_setopt_array($ch, $options );
    $api_response = curl_exec($ch);
    $api_response_info = curl_getinfo($ch);
    curl_close($ch);
    return $api_response;
}

function GetTagObject($id) {
    $json = file_get_contents("http://localhost:8080/api/tag/$id");
    $json = json_decode($json);
    $tag = Tag::create($json);
    return $tag;
}

function AddBookingObject($booking){
    $api_request_url = "http://localhost:8080/api/booking";
    $data = array (
        'user_id' => $booking->getUser_id(),
        'activity_id' => $booking->getActivity_id(),       
        'n_people' => $booking->getN_people(),
        'minute' => $booking->getMinute(),
        'date' => $booking->getDate(),
        'hour' => $booking->getHour()
    );
    $ch = curl_init();
    $options = array(
        CURLOPT_URL            => $api_request_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 12000,
        CURLOPT_TIMEOUT        => 12000,
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_POSTFIELDS     => json_encode($data),
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => array('Content-Type: application/json')
    );
    curl_setopt_array( $ch, $options );
    $api_response = curl_exec($ch);
    $api_response_info = curl_getinfo($ch);
    curl_close($ch);
    return $api_response;
}

function GetBookingObjectByUser($user_id) {
    $json = file_get_contents("http://localhost:8080/api/booking/user/$user_id");
    $json = json_decode($json);
    $bookings = array();
    foreach ($json as $booking) {
        $bookings[] = Booking::create($booking);
    }
    return $bookings;
}

function GetHobbiesObject() {
    $json = file_get_contents("http://localhost:8080/api/activity/all");
    $json = json_decode($json); 
    $hobbies = array();
    foreach ($json as $hobby) {
        $hobbies[] = Hobby::create($hobby);
    }
    return $hobbies;
}

function GetHobbyObject($id) {
    $json = file_get_contents("http://localhost:8080/api/activity/$id");
    $json = json_decode($json);
    $hobby = Hobby::create($json);
    return $hobby;
}

/*function GetTagsActivityObject($id) {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=tag&activity=$id");
    $json = json_decode($json); 
    $tags = array();
    foreach ($json->data as $tag) {
        $tags[] = Tag::create($tag);
    }
    return $tags;
}*/

function GetPhotosActivityObject($id) {
    $json = file_get_contents("http://localhost:8080/api/photo/activity/$id");
    $json = json_decode($json); 
    $photos = array();
    foreach ($json as $photo) {
        $photos[] = Photo::create($photo);
    }
    return $photos;
}
    
?>