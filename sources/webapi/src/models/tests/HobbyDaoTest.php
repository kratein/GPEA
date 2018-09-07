<?php
    /*
 * File: HobbyDaoTest.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/* 
 * script très moche et rapide pour tester la dao 
 */
require_once('../DAO/HobbyDao.php');
require_once('../../class/Database.php');
require_once('../../class/DatabaseConfig.php');
require_once('../entities/Hobby.php');
require_once('../entities/Entities.php');

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
    $hobby = new Hobby();
    $hobby->setLabel('test');
    $hobby->setDescription('description');
    $hobby->setWebSite('url du site');
    $hobby->setOlder(5);
    $hobby->setStreet('42 rue des testeurs');
    $hobby->setZipCode(91860);
    $hobby->setCity('Ville du test');

    $result = HobbyDao::add($hobby);
    return $result;
}

function testGet($id)
{
    return HobbyDao::get($id);
}

function testGetAll()
{
    return HobbyDao::getAll();
}

function testDelete($id)
{
    return HobbyDao::delete($id);
}

function testUpdate($id)
{
    $hobby = HobbyDao::get($id);
    $hobby->setStreet('fighdfjgsjgosjdgmousdfog');
    return HobbyDao::update($hobby);
}
?>