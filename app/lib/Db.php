<?php

namespace app\lib;

use PDO;

/**
 * Class for database connection
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class Db
{
    protected $db;
            
    public function __construct()
    {
        $config = require 'app/config/db.php';
        try{
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);
        }catch(PDOException $err){
            echo 'No connection to db' . $err->getMessage();
        }
    }
    
    public function query($sql, $params = []){
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $val){
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }
    
    public function row($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}