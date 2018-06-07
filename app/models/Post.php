<?php
/**
 * Created by PhpStorm.
 * User: Ertug
 * Date: 7.06.2018
 * Time: 14:27
 */

class Post  {
    private $db;

    public function __construct(){
        $this->db=new Database ;
    }

    public function getPosts(){
        $this->db=Database::get("SELECT * FROM posts");

        return $this->db;
   }

    public function getTitle(){
        $this->db=Database::getVar("SELECT COUNT(title)  FROM posts");

        return $this->db;
    }


}