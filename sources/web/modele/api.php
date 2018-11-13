<?php
require_once ('../../webapi/src/models/entities/Tag.php');
require_once ('../../webapi/src/models/entities/Hobby.php');
require_once ('../../webapi/src/models/entities/Photo.php');
require_once ('../../webapi/src/models/DAO/BookingDao.php');

function GetTagsObject() {
    $json = file_get_contents("http://localhost:8080/api/tag/all");
    $json = json_decode($json); 
    $tags = array();
    foreach ($json as $tag) {
        $tags[] = Tag::create($tag);
    }
    return $tags;
}
function addBooking($stdClass){
    BookingDao::add($stdClass);
}


function GetTagObject($id) {
    $json = file_get_contents("http://localhost:8080/api/tag/$id");
    $json = json_decode($json);
    $tag = Tag::create($json);
    return $tag;
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

function GetTagsActivityObject($id) {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=tag&activity=$id");
    $json = json_decode($json); 
    $tags = array();
    foreach ($json->data as $tag) {
        $tags[] = Tag::create($tag);
    }
    return $tags;
}

function GetPhotosActivityObject($id) {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=photo&activity=$id");
    $json = json_decode($json); 
    $photos = array();
    foreach ($json->data as $photo) {
        $photos[] = Photo::create($photo);
    }
    return $photos;
}
    
?>