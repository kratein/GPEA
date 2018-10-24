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
require_once('DAO/BookingDao.php');

require_once('entities/Hobby.php');
require_once('entities/Photo.php');
require_once('entities/User.php');
require_once('entities/Role.php');
require_once('entities/Tag.php');
require_once('entities/Entities.php');
require_once('entities/Booking.php');

require_once('../class/Database.php');
require_once('../class/DatabaseConfig.php');


if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        switch ($name) {
            case 'booking':
                response(200, 'Booking', getBooking($id));
                break;
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
    } else if (!empty($_GET['activity'])) {
        $activity = $_GET['activity'];
        switch ($name) {
            case 'tag': 
                response(200, 'Tag', getTagsActivity($activity));
                break;
            case 'photo':
                response(200, 'Photo', getPhotosActivity($activity));
                break;
            default:
                response(400, 'Unknown name', null);
        }
    } else {
        switch ($name) {
            case 'booking':
                response(200, 'Booking', getBookings());
                break;
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

function getBookings()
{
    return BookingDAO::getAll();
}

function getBooking($id)
{
    return BookingDAO::get($id);;
}

function getTags()
{
    return TagDAO::getAll();
}

function getTag($id)
{
    return TagDAO::get($id);;
}

function getTagsActivity($id) 
{
    return TagDAO::getTagByActivity($id);
}
function getRoles()
{
    return RoleDao::getAll();
}

function getRole($id)
{
    return RoleDAO::get($id);
}

function getHobbies()
{
    return HobbyDAO::getAll();
}

function getHobby($id)
{
    return HobbyDAO::get($id);
}

function getPhotos()
{
    return PhotoDAO::getAll();
}

function getPhoto($id)
{
    return PhotoDAO::get($id);
}

function getPhotosActivity($id) 
{
    return PhotoDAO::getPhotoByActivity($id);
}

function getUsers()
{
    return UserDao::getAll();
}

function getUser($id)
{
    return UserDAO::get($id);
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