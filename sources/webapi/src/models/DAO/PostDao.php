<?php
    /*
 * File: PostDao.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

/**
 * Class PostDAO
 * @author Dylan <bonin_d@etna-alternance.net>
 * class pour le sql sur la table post
 *  Table post
 * id INT,
 * content TEXT,
 * grade FLOAT,
 * id_user INT,
 * id_hobbyactivitiy INT,
 */
class PostDAO
{

    public static function get($id)
    {
        $params = array(
            'id' => $id
        );
        $query = 'SELECT * FROM post WHERE id = :id';
        $result = Database::getInstance()->query($query, $params);
        if ($result) {
            return UserDao::create($result[0]);
        }
        return null;
    }

    public static function getAll()
    {
        $posts = array();
        $query = 'SELECT * FROM post';
        $result = Database::getInstance()->query($query);
        foreach ($result as $row) {
            $posts[] = Post::create($row);
        }
        return $posts;
    }

    public static function add($post)
    {
        $params = array(
            'content' => $post->getContent(),
            'grade' => $post->getGrade(),
            'id_user' => $post->getAuthor()->getId(),
            'id_hobbyactivity' => $post->getHobby()->getId()
        );
        $query = 'INSERT INTO post (content, grade, id_user, id_hobbyactivity)
            VALUES (:content, :grade, :id_user, :id_hobbyactivity)';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function update($post)
    {
        $params = array(
            'id' => $post->getId(),
            'content' => $post->getContent(),
            'grade' => $post->getGrade(),
            'id_user' => $post->getAuthor()->getId(),
            'id_hobbyactivity' => $post->getHobby()->getId()
        );
        $query = 'UPDATE post SET content = :content, grade = :grade, id_user = :id_user, id_hobbyactivity = :id_hobbyactivity WHERE id = :id';
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
        $query = 'DELETE FROM post WHERE id = :id';
        $result = Database::getInstance()->exec($query, $params);
        return $result;
    }

    public static function getFromHobby($id_hobbyactivity) {
        $posts = array();
        $params = array (
            'id_hobbyactivity' => $id_hobbyactivity
        );
        $query = 'SELECT * FROM post WHERE id_hobbyactivity = :id_hobbyactivity';
        $result = Database::getInstance()->query($query, $params);
        foreach ($result as $row) {
            $posts[] = Post::create($row);
        }
        return $posts;
    }
}
?>