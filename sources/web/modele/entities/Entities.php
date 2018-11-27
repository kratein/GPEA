<?php
    /*
 * File: Entities.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 02:24:35 pm
 * Author: Dylan BONIN
 */

/**
 * abstract Entities
 * @author Dylan <bonin_d@etna-alternance.net>
 * Entites is a abstract class. Mother of other entities class
 */
abstract class Entities
{

    protected $_id;


    protected abstract function toArray();

    public function equals($other)
    {
        if (get_class($this) != get_class($other)) {
            return false;
        } else {
            return $this->_id == $other->getId();
        }
    }

    public function toString()
    {
        return __class__;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }
}
?>