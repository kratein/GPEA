<?php
require_once ('../../webapi/src/models/entities/Tag.php');
require_once ('../../webapi/src/models/entities/Hobby.php');

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
        $hobbies[] = Hobby::create($hobby);
    }
    return $hobbies;
}
    
?>