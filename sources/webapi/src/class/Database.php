<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

class Database {

    private $pdo;
    private $connected;

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new Database();
        }
        return $instance;
    }

    private function __construct() {
        $this->connected = false;
    }

    private function connect(){
        if(!$this->connected){
            $config = new DatabaseConfig();
            try {
                $this->pdo = new PDO('mysql:host=' . $config->getHostname() . ';dbname=' . $config->getDatabase() . ';charset=' . $config->getCharset(), $config->getUser(), $config->getPassword());
                $this->connected = true;
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    public function query($query, $params = array(), $cacheTime = 0) {
        if($cacheTime > 0) {
            $hash = md5($query."_".implode(",", $params));

            $redis = new Redis();
            $redis->connect('127.0.0.1', 6379);

            $get = $redis->get('querycache_'.$hash);

            if($get) {
                $get = unserialize($get);
                if(time() < $get["expire"]) {
                    return $get["data"];
                }
            }
        }

        $this->connect();
        $result = [];
        try {
            $req = $this->pdo->prepare($query);
            $req->execute($params);

            while ($row = $req->fetch(PDO::FETCH_OBJ)) {
                $result[] = $row;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }

        if($cacheTime > 0) {
            $redis->set('querycache_'.$hash, serialize(array("expire" => time() + $cacheTime, "data" => $result)));
        }

        return $result;
    }

    public function exec($query, $params = array()) {
        $this->connect();
        try {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        return $req;
    }

    public function single($query, $params = array(), $cacheTime = 0) {
        $result = $this->query($query, $params, $cacheTime);

        return count($result) > 0 ? $result[0] : false;
    }

    public function lastInsertId() {
        return  $this->pdo->lastInsertId();
    }
}
