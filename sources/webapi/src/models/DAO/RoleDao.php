<?php
    /*
 * File: RoleDao.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/**
 * Class RoleDAO
 * @author Dylan <bonin_d@etna-alternance.net>
 * class pour le sql sur la table role
 * Table role
 * id INT,
 * label TEXT 
 */

class RoleDAO
{

    public static function get($id)
    {
        $params = array(
            'id' => $id
        );
        $query = 'SELECT * FROM role WHERE id = :id';
        $result = Database::getInstance()->query($query, $params);
        if ($result) {
            return Role::create($result[0]);
        }
        return null;
    }

    public static function getAll()
    {
        $roles = array();
        $query = 'SELECT * FROM role';
        $result = Database::getInstance()->query($query);
        foreach ($result as $row) {
            $roles[] = Role::create($row);
        }
        return $roles;
    }

    public static function add($role)
    {
        $params = array(
            'label' => $role->getLabel()
        );
        $query = 'INSERT INTO role (label) VALUES (:label)';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function update($role)
    {
        $params = array(
            'id' => $role->getId(),
            'label' => $role->getLabel()
        );
        $query = 'UPDATE role SET label = :label WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function delete($id)
    {
        if ($id == null) {
            return false;
        }
        $params = array(
            'id' => $id
        );
        $query = 'DELETE FROM role WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }
}
?>