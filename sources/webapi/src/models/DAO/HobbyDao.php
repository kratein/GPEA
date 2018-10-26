<?php
    /*
 * File: HobbyDao.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */


/**
 * Class HobbyDAO
 * @author Dylan <bonin_d@etna-alternance.net>
 * class pour le sql sur la table hobby
 * Table 'hobbyactivity' 
 *  id INT,
 *  label TEXT,
 *  description TEXT,
 *  web_site TEXT,
 *  minimum_older INT,
 *  street TEXT,
 *  zip_code INT,
 *  city TEXT
 */
class HobbyDAO
{

    public static function get($id)
    {
        $params = array(
            'id' => $id
        );
        $result = Database::getInstance()->query('SELECT * 
        FROM  hobbyactivity
        WHERE hobbyactivity.id = :id', $params);
        $resultTag = Database::getInstance()->query('SELECT tag.id, tag.label FROM tag, has_tags 
        WHERE tag.id = has_tags.id_tag AND has_tags.id_hobbyactivity = :id', $params);
        if ($result) {
            $hobby = Hobby::create($result[0]);
            if ($resultTag) {
                $tags = array();
                foreach ($resultTag as $row) {
                    $tags[] = Tag::create($row);
                }
                $hobby->setTags($tags);
            }
            return $hobby;
        }
        return null;
    }

    public static function add($hobby)
    {
        $params = array(
            'label' => $hobby->getLabel(),
            'description' => $hobby->getDescription(),
            'webSite' => $hobby->getWebSite(),
            'older' => $hobby->getOlder(),
            'street' => $hobby->getStreet(),
            'zipCode' => $hobby->getZipCode(),
            'city' => $hobby->getCity(),
            'cover' => $hobby->getCover(),
            'slogan' => $hobby->getSlogan()
        );
        $req = 'INSERT INTO hobbyactivity
            (label, description, web_site, minimum_older, street, zip_code, city, cover, slogan) 
            VALUES (:label, :description, :webSite, :older, :street, :zipCode, :city, :cover, :slogan);';
        $query = Database::getInstance()->exec($req, $params);
        return $query;
    }

    public static function update($hobby)
    {
        $params = array(
            'id' => $hobby->getId(),
            'label' => $hobby->getLabel(),
            'description' => $hobby->getDescription(),
            'webSite' => $hobby->getWebSite(),
            'older' => $hobby->getOlder(),
            'street' => $hobby->getStreet(),
            'zipCode' => $hobby->getZipCode(),
            'city' => $hobby->getCity(),
            'cover' => $hobby->getCover(),
            'slogan' => $hobby->getSlogan()
        );
        $query = Database::getInstance()->exec('UPDATE hobbyactivity 
             SET 
                label = :label, 
                description = :description,
                web_site = :webSite,
                minimum_older = :older,
                street = :street,
                zip_code = :zipCode,
                city = :city, 
                cover = :cover,
                slogan = :slogan WHERE id = :id', $params);
        return $query;
    }

    public static function delete($id)
    {
        if ($id == null) {
            return false;
        }
        $params = array(
            'id' => $id
        );
        $query = Database::getInstance()->exec('DELETE FROM hobbyactivity WHERE id = :id', $params);
        return $query;
    }

    public static function getTags($id)
    {
        $params = array(
            'id' => $id
        );
        $resultTag = Database::getInstance()->query('SELECT tag.id, tag.label FROM tag, has_tags 
        WHERE tag.id = has_tags.id_tag AND has_tags.id_hobbyactivity = :id', $params);
        if ($resultTag) {
            $tags = array();
            foreach ($resultTag as $row) {
                $tags[] = Tag::create($row);
            }
        }
        return $tags;
    }

    public static function getAll()
    {
        $hobbies = array();
        $result = Database::getInstance()->query('SELECT * FROM hobbyactivity');
        foreach ($result as $row) {
            $hobby = Hobby::create($row);
            $params =array(
                'id' => $hobby->getId()
            );
            $resultTag = Database::getInstance()->query('SELECT tag.id, tag.label FROM tag, has_tags 
            WHERE tag.id = has_tags.id_tag AND has_tags.id_hobbyactivity = :id', $params);
            if ($resultTag) {
                $tags = array();
                foreach ($resultTag as $row) {
                    $tags[] = Tag::create($row);
                }
                $hobby->setTags($tags);
            }
            $hobbies[] = $hobby;
        }
        return $hobbies;
    }
}

?>