<?php
    /*
 * File: UserDaoTest.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/* 
 * script très moche et rapide pour tester la dao 
 */
require_once('../../class/Database.php');
require_once('../../class/DatabaseConfig.php');

require_once('../entities/User.php');
require_once('../entities/Role.php');
require_once('../entities/Entities.php');

require_once('../DAO/UserDao.php');
require_once('../DAO/RoleDao.php');


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
    $role->setId(1);
    $role->setLabel('admin');
    $user = new User();
    $user->setName('dupont');
    $user->setFirstName('martin');
    $user->setBirthday('2018-07-25');
    $user->setEmail('martin@dupont.fr');
    $user->setPassword('password');
    $user->setStreet('rue dupont');
    $user->setZipCode(25648);
    $user->setCity('MartinVille');
    $user->setRole($role);
    $user->setPhoto('maPhoto');

    $result = userDao::add($user);
    return $result;
}

function testGet($id)
{
    return UserDao::get($id);
}

function testGetAll()
{
    return UserDao::getAll();
}

function testDelete($id)
{
    return UserDao::delete($id);
}

function testUpdate($id)
{
    $user = UserDao::get($id);
    $user->setName('fighdfjgsjgosjdgmousdfog');
    return UserDao::update($user);
}
?>