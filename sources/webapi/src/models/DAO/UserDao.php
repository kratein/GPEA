<?php
    /*
 * File: UserDao.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/**
 * Class UserDAO
 * @author Dylan <bonin_d@etna-alternance.net>
 * class pour le sql sur la table user
 * Table user
 * id INT,
 * name TEXT,
 * firstname TEXT,
 * birthday DATE,
 * email TEXT,
 * password TEXT,
 * street TEXT,
 * zip_code INT,
 * city TEXT,
 * id_role INT,
 * photo TEXT,
 */

class UserDAO
{

    public static function get($id)
    {
        $params = array(
            'id' => $id
        );
        $query = 'SELECT * FROM user WHERE id = :id';
        $result = Database::getInstance()->query($query, $params);
        if ($result) {
            return User::create($result[0]);
        }
        return null;
    }

    public static function getAll()
    {
        $users = array();
        $query = 'SELECT * FROM user';
        $result = Database::getInstance()->query($query);
        foreach ($result as $row) {
            $users[] = User::create($row);
        }
        return $users;
    }

    public static function add($user)
    {
        $params = array(
            'name' => $user->getName(),
            'firstName' => $user->getFirstName(),
            'birthday' => $user->getBirthday(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'street' => $user->getStreet(),
            'zip_code' => $user->getZipCode(),
            'city' => $user->getCity(),
            'id_role' => $user->getRole()->getId(),
            'photo' => $user->getPhoto()
        );
        $query = 'INSERT INTO user (name, firstname, birthday, email, password, street, zip_code, city, id_role, photo)
            VALUES (:name, :firstName, :birthday, :email, :password, :street, :zip_code, :city, :id_role, :photo)';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function update($user)
    {
        $params = array(
            'id' => $user->getId(),
            'name' => $user->getName(),
            'firstName' => $user->getFirstName(),
            'birthday' => $user->getBirthday(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'street' => $user->getStreet(),
            'zip_code' => $user->getZipCode(),
            'city' => $user->getCity(),
            'id_role' => $user->getRole()->getId(),
            'photo' => $user->getPhoto()
        );
        $query = 'UPDATE user SET 
            name = :name, firstname = :firstName, birthday = :birthday, email = :email, password = :password, 
            street = :street, zip_code = :zip_code, city = :city, id_role = :id_role, photo = :photo WHERE id = :id';
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
        $query = 'DELETE FROM user WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }
}
?>