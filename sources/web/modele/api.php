<?php
require_once ('../../webapi/src/models/entities/Tag.php');
require_once ('../../webapi/src/models/entities/Hobby.php');
require_once ('../../webapi/src/models/entities/Photo.php');

function GetTagsObject() {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=tag");
    $json = json_decode($json); 
    $tags = array();
    foreach ($json->data as $tag) {
        $tags[] = Tag::create($tag);
    }
    return $tags;
}

function GetTagObject($id) {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=tag&id=$id");
    $json = json_decode($json);
    $tag = Tag::create($json->data);
    return $tag;
}

function GetHobbiesObject() {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=hobby");
    $json = json_decode($json); 
    $hobbies = array();
    foreach ($json->data as $hobby) {
        $tagsHobby = array();
        $newHobby = Hobby::create($hobby);
        foreach($hobby->tags as $tags) {
            $tagsHobby[] = Tag::create($tags);
        }
        $newHobby->setTags($tagsHobby);
        $hobbies[] = $newHobby;
    }
    return $hobbies;
}

function GetHobbyObject($id) {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=hobby&id=$id");
    $json = json_decode($json);
    $hobby = Hobby::create($json->data);
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

function GetPhotosActivity($id) {
    $json = file_get_contents("http://localhost/GPEA/sources/webapi/src/models/api.php?name=photo&activity=$id");
    $json = json_decode($json); 
    $photos = array();
    foreach ($json->data as $photo) {
        $photos[] = Photo::create($photo);
    }
    return $photos;
}
    
?>