<?php
    /*
 * File: TagDaoTest.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/* 
 * script très moche et rapide pour tester la dao 
 */
require_once('../DAO/TagDao.php');
require_once('../../class/Database.php');
require_once('../../class/DatabaseConfig.php');
require_once('../entities/Tag.php');
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
    $tag = new Tag();
    $tag->setLabel('action');

    $result = TagDao::add($tag);
    return $result;
}

function testGet($id)
{
    return TagDao::get($id);
}

function testGetAll()
{
    return TagDao::getAll();
}

function testDelete($id)
{
    return TagDao::delete($id);
}

function testUpdate($id)
{
    $tag = TagDao::get($id);
    $tag->setlabel('fighdfjgsjgosjdgmousdfog');
    return TagDao::update($tag);
}
?>