<?php
    /*
 * File: PhotoDao.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/**
 * Class PhotoDAO
 * @author Dylan <bonin_d@etna-alternance.net>
 * class pour le sql sur la table photo
 * Table photo :
 * id INT,
 * title TEXT,
 * path TEXT,
 * description TEXT,
 * id_hobbyactivitiy INT References hobbyactivity
 */
class PhotoDAO
{

    public static function get($id)
    {
        $params = array(
            'id' => $id
        );
        $result = Database::getInstance()->query('SELECT * FROM photo WHERE id = :id', $params);
        if ($result) {
            return Photo::create($result[0]);
        }
        return null;
    }

    public static function add($photo)
    {
        $params = array(
            'title' => $photo->getTitle(),
            'path' => $photo->getPath(),
            'description' => $photo->getDescription(),
            'id_hobbyactivicty' => $photo->getHobby()->getId()
        );
        $query = Database::getInstance()->exec(
            'INSERT INTO photo 
            (title, path, description, id_hobbyactivity)
            VALUES (:title, :path, :description, :id_hobbyactivicty)',
            $params
        );
        return $query;
    }

    public static function update($photo)
    {
        $params = array(
            'id' => $photo->getId(),
            'title' => $photo->getTitle(),
            'path' => $photo->getPath(),
            'description' => $photo->getDescription(),
            'id_hobbyactivicty' => $photo->getHobby()->getId()
        );
        $query = Database::getInstance()->exec('UPDATE photo SET 
                title = :title, 
                path = :path,
                description = :description,
                id_hobbyactivity = :id_hobbyactivicty WHERE id = :id', $params);
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
        $query = Database::getInstance()->exec('DELETE FROM photo WHERE id = :id', $params);
        return $query;
    }

    public static function getAll()
    {
        $photos = array();
        $result = Database::getInstance()->query('SELECT * FROM photo');
        foreach ($result as $row) {
            $photos[] = Photo::create($row);
        }
        return $photos;
    }
}

?>