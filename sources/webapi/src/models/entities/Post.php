<?php
    /*
 * File: Post.php
 * Project: GPE
 * File Created: Thursday, 26th July 2018 09:51:39 am
 * Author: Dylan BONIN
 */

require_once('Entities.php');
/**
 * @author Dylan <bonin_d@etna-alternance.net>
 * Class Post :
 * This class represents a 'post' from the database
 */
class Post extends Entities implements JsonSerializable
{

    private $_content;
    private $_grade;
    private $_author;
    private $_hobby;

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
     * @return Object Post
     */
    public static function create($stdClass)
    {
        if ($stdClass == null) {
            return null;
        }
        $post = new Post();
        $post->setId($stdClass->id);
        $post->setContent($stdClass->content);
        $post->setGrade($stdClass->grade);
        $post->setAuthor(UserDao::get($stdClass->id_user));
        $post->setHobby(HobbyDao::get($stdClass->id_hobbyactivity));
        return $post;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getGrade()
    {
        return $this->_grade;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function getHobby()
    {
        return $this->_hobby;
    }

    public function setContent($content)
    {
        $this->_content = $content;
    }

    public function setGrade($grade)
    {
        $this->_grade = $grade;
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function setHobby($hobby)
    {
        $this->_hobby = $hobby;
    }

    /**
     * toArray declared in Entities
     *
     * Take value of members and create an array 'memberName' => value
     * @return array
     */
    public function toArray()
    {
        $array = array(
            'id' => $this->_id,
            'content' => $this->_content,
            'grade' => $this->_grade,
            'user' => $this->_user->toArray(),
            'hobby' => $this->_hobby->toArray()
        );
        return $array;
    }

    public function toString()
    {
        return __class__;
    }

    public function jsonSerialize() 
    {
        return $this->toArray();
    }
}

?>