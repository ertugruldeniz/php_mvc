<?php
/**
 * Created by PhpStorm.
 * User: Ertug
 * Date: 6.06.2018
 * Time: 01:42
 */

/*
 * App Core Class
 * Creates Url & loads core Controller
 * Url Format /controller/methos/params
 */

class Core{

    protected  $currentController='Pages';
    protected  $currentMethod='index';
    protected $params=[];

    public function __construct(){
        //var_dump($this->getUrl());
        $url=$this->getUrl();


        //Controller for first value //Dizinin ilk elemanı controller
        if(file_exists("../app/controllers/".ucwords($url[0]).".php" )){

            //if exists,set as controller

            $this->currentController=ucwords($url[0]);

            //unset 0 index

            unset($url[0]);

        }

        //Require the controller
        require_once "../app/controllers/".$this->currentController.".php";

        $this->currentController=new $this->currentController;


        //Check for second part of url //url 2. alanı kontrol

        if(isset($url[1])){
            if (method_exists($this->currentController,$url[1])){
                $this->currentMethod=$url[1];

                //Unset 1 index
                unset($url[1]);
            }

            //Gelen 2 .parametre
            //echo $this->currentMethod;

            $this->params=$url ? array_values($url): [];

            //Call a callback with array of params
            call_user_func([$this->currentController,$this->currentMethod],$this->params);
        }

    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode("/",$url);
            return $url;
        }
    }



}