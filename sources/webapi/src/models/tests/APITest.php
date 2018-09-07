<?php
require_once ('../entities/Tag.php');
//essaie pour lire le json
$json = file_get_contents("http://localhost/GPE/sources/webapi/src/models/api.php?name=tag&id=1");
$json = json_decode($json); 
var_dump($json);
$tag = Tag::create($json->data);
var_dump($tag);
?>