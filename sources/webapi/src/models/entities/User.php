<?php
    /*
 * File: User.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

require_once('Entities.php');

/**
 * @author Dylan <bonin_d@etna-alternance.net>
 * Class User :
 * This class represents a 'user' from the database
 */
class User extends Entities implements JsonSerializable
{

    private $_name;
    private $_firstName;
    private $_birthday;
    private $_email;
    private $_password;
    private $_street;
    private $_zip_code;
    private $_city;
    private $_photo;
    private $_role;

    /**
     * Default constructor empty
     */
    public function __construct()
    {

    }

    /**
     * create
     *
     * @param Array like $stdClass -> return of PDO 
     * @return Object User
     */
    public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $user = new User();
        $user->setId($stdClass->id);
        $user->setName($stdClass->name);
        $user->setFirstName($stdClass->firstname);
        $user->setBirthday($stdClass->birthday);
        $user->setEmail($stdClass->email);
        $user->setPassword($stdClass->password);
        $user->setStreet($stdClass->street);
        $user->setZipCode($stdClass->zip_code);
        $user->setCity($stdClass->city);
        $user->setPhoto($stdClass->photo);
        $user->setRole($stdClass->id_role);
        return $user;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function getBirthday()
    {
        return $this->_birthday;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function getStreet()
    {
        return $this->_street;
    }

    public function getZipCode()
    {
        return $this->_zip_code;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function getPhoto()
    {
        return $this->_photo;
    }

    public function getRole()
    {
        return $this->_role;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    public function setBirthday($birthday)
    {
        $this->_birthday = $birthday;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function setStreet($street)
    {
        $this->_street = $street;
    }

    public function setZipCode($zipCode)
    {
        $this->_zip_code = $zipCode;
    }

    public function setCity($city)
    {
        $this->_city = $city;
    }

    public function setPhoto($photo)
    {
        $this->_photo = $photo;
    }

    public function setRole($role)
    {
        $this->_role = $role;
    }

    /**
     * toArray
     *
     * Take value of members and create an array 'memberName' => value
     * @return array
     */
    public function toArray()
    {
        $array = array(
            'id' => $this->_id,
            'name' => $this->_name,
            'firstName' => $this->_firstName,
            'birthday' => $this->_birthday,
            'email' => $this->_email,
            'password' => $this->_password,
            'street' => $this->_street,
            'zip_code' => $this->_zip_code,
            'city' => $this->_city,
            'role' => $this->_role,
            'photo' => $this->_photo
        );
        return $array;
    }

    public function toString()
    {
        return __class__;
    }

    public function JsonSerialize()
    {
        return $this->toArray();
    }
}
?>