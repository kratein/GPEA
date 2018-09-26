<?php
    /*
 * File: TagDao.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/**
 * Class TagDAO
 * @author Dylan <bonin_d@etna-alternance.net>
 * class pour le sql sur la table tag
 * Table tag
 * id INT,
 * label TEXT 
 */

class TagDAO
{

    public static function get($id)
    {
        $params = array(
            'id' => $id
        );
        $query = 'SELECT * FROM tag WHERE id = :id';
        $result = Database::getInstance()->query($query, $params);
        if ($result) {
            return Tag::create($result[0]);
        }
        return null;
    }

    public static function getTagByActivity($activityId) 
    {
        $params = array(
            'id' => $activityId
        );
        $tags = array();
        $query = 'SELECT T.id, T.label FROM has_tags H, tag T, hobbyactivity A 
                WHERE T.id = H.id_tag 
                AND H.id_HobbyActivity = A.id
                AND id_hobbyactivity = :id';
        $result = Database::getInstance()->query($query, $params);
        var_dump($result);
        foreach ($result as $row) {
            $tags[] = Tag::create($row);
        }
        return $tags;
    }

    public static function getColumns($id, $columns)
    {
        $params = array(
            'id' => $id
        );
        $query = 'SELECT '.concatColumns($columns).' FROM tag WHERE id = :id';
        $result = Database::getInstance()->query($query, $params);
        if ($result) {
            return Tag::create($result[0]);
        }
        return null;
    }

    public static function getAll()
    {
        $tags = array();
        $query = 'SELECT * FROM tag';
        $result = Database::getInstance()->query($query);
        foreach ($result as $row) {
            $tags[] = Tag::create($row);
        }
        return $tags;
    }

    public static function add($tag)
    {
        $params = array(
            'label' => $tag->getLabel()
        );
        $query = 'INSERT INTO tag (label) VALUES (:label)';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function update($tag)
    {
        $params = array(
            'id' => $tag->getId(),
            'label' => $tag->getLabel()
        );
        $query = 'UPDATE tag SET label = :label WHERE id = :id';
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
        $query = 'DELETE FROM tag WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    private function concatColumns($columns)
    {
        $result = "";
        foreach ($columns as $column)
        {
            $result .= $column;
        }       
        if ($result == "") 
        {
            $result = "*";
        }
        return $result;  
    }
}
?>