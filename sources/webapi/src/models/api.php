<?php
    /*
 * File: api.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 10:40:21 am
 * Author: Dylan BONIN
 */




/**
 * First try api
 * Get request -> analyse params and return json
 * name='Entity' return all entities
 * name='Entity'&id=<int> return one entity
 * @author Dylan <bonin_d@etn-alternance.net>
 */
require_once('DAO/TagDao.php');
require_once('DAO/RoleDao.php');
require_once('DAO/UserDao.php');
require_once('DAO/PhotoDao.php');
require_once('DAO/HobbyDao.php');

require_once('entities/Hobby.php');
require_once('entities/Photo.php');
require_once('entities/User.php');
require_once('entities/Role.php');
require_once('entities/Tag.php');
require_once('entities/Entities.php');

require_once('../class/Database.php');
require_once('../class/DatabaseConfig.php');


if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        switch ($name) {
            case 'tag':
                response(200, 'Tag', getTag($id));
                break;
            case 'role':
                response(200, 'Role', getRole($id));
                break;
            case 'hobby':
                response(200, 'Hobby', getHobby($id));
                break;
            case 'photo':
                response(200, 'Photo', getPhoto($id));
                break;
            case 'user':
                response(200, 'User', getUser($id));
                break;
            default:
                response(400, 'Unknown name', null);
        }
    } else {
        switch ($name) {
            case 'tag':
                response(200, 'Tag', getTags());
                break;
            case 'role':
                response(200, 'Role', getRoles());
                break;
            case 'hobby':
                response(200, 'Hobby', getHobbies());
                break;
            case 'photo':
                response(200, 'Photo', getPhotos());
                break;
            case 'user':
                response(200, 'User', getUsers());
                break;
            default:
                response(400, 'Unknown name', null);
        }
    }
} else {
    response(400, 'Invalid request', null);
}

function getTags()
{
    $tags = TagDAO::getAll();
    return $tags;
}

function getTag($id)
{
    $tag = TagDAO::get($id);
    if ($tag == null) {
        return array();
    }
    return $tag;
}

function getRoles()
{
    $roles = RoleDao::getAll();
    $result = array();
    foreach ($roles as $role) {
        $item = $role->toArray();
        array_push($result, $item);
    }
    return $result;
}

function getRole($id)
{
    $role = RoleDAO::get($id);
    if ($role == null) {
        return array();
    }
    return $role->toArray();
}

function getHobbies()
{
    $hobbies = HobbyDAO::getAll();
    $result = array();
    foreach ($hobbies as $hobby) {
        $item = $hobby->toArray();
        array_push($result, $item);
    }
    return $result;
}

function getHobby($id)
{
    $hobby = HobbyDAO::get($id);
    if ($hobby == null) {
        return array();
    }
    return $hobby->toArray();
}

function getPhotos()
{
    $photos = PhotoDAO::getAll();
    $result = array();
    foreach ($photos as $photo) {
        $item = $photo->toArray();
        array_push($result, $item);
    }
    return $result;
}

function getPhoto($id)
{
    $photo = PhotoDAO::get($id);
    if ($photo == null) {
        return array();
    }
    return $photo->toArray();
}

function getUsers()
{
    $users = UserDao::getAll();
    $result = array();
    foreach ($users as $user) {
        $item = $user->toArray();
        array_push($result, $item);
    }
    return $result;
}

function getUser($id)
{
    $user = UserDAO::get($id);
    if ($user == null) {
        return array();
    }
    return $user->toArray();
}

function response($status, $status_message, $data)
{
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}
?>