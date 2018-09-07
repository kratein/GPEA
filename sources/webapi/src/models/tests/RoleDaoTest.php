<?php
    /*
 * File: RoleDaoTest.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/* 
 * script très moche et rapide pour tester la dao 
 */
require_once('../../class/Database.php');
require_once('../../class/DatabaseConfig.php');
require_once('../DAO/RoleDao.php');
require_once('../entities/Role.php');
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
    $role = new Role();
    $role->setLabel('admin');

    $result = roleDao::add($role);
    return $result;
}

function testGet($id)
{
    return roleDao::get($id);
}

function testGetAll()
{
    return roleDao::getAll();
}

function testDelete($id)
{
    return roleDao::delete($id);
}

function testUpdate($id)
{
    $role = roleDao::get($id);
    $role->setlabel('fighdfjgsjgosjdgmousdfog');
    return roleDao::update($role);
}
?>