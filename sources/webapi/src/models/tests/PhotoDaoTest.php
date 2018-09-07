<?php
    /*
 * File: PhotoDaoTest.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/* 
 * script très moche et rapide pour tester la dao 
 */
require_once('../DAO/PhotoDao.php');
require_once('../../class/Database.php');
require_once('../../class/DatabaseConfig.php');
require_once('../entities/Photo.php');
require_once('../entities/Hobby.php');
require_once('../entities/Entities.php');
require_once('../DAO/HobbyDao.php');

if (testAdd()) {
    $id = Database::getInstance()->lastInsertId();
    if (testGet($id) != null) {
        if (testGetAll() != null) {
            if (testUpdate($id)) {
                if (testDelete($id)) {
                    echo ('OK !');
                } else {
                    echo ('erreur delete');
                }
            } else {

                echo ('erreur update');
            }
        } else {
            echo ('erreur getall');
        }
    } else {
        echo ('Erreur get');
    }
} else {
    echo ('Erreur add');
}


function testAdd()
{
    $photo = new Photo();
    $photo->setTitle('test');
    $photo->setPath('quelque part');
    $photo->setDescription('super description');
    $photo->setHobby(HobbyDAO::get(5));

    $result = PhotoDao::add($photo);
    return $result;
}

function testGet($id)
{
    return PhotoDao::get($id);
}

function testGetAll()
{
    return PhotoDao::getAll();
}

function testDelete($id)
{
    return PhotoDao::delete($id);
}

function testUpdate($id)
{
    $photo = PhotoDao::get($id);
    $photo->setPath('fighdfjgsjgosjdgmousdfog');
    return PhotoDao::update($photo);
}
?>