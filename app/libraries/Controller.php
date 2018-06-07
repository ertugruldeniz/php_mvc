<?php
/**
 * Created by PhpStorm.
 * User: Ertug
 * Date: 6.06.2018
 * Time: 01:43
 */

//Base Controller Models and Views

class Controller{

    // Load Model

    public function model($model){
        //Require Model File

        require_once "../app/models/".$model.".php";

        return new $model();
    }

    //Load View

    public  function view($view,$data=[]){
        //Check for View File

        if(file_exists('../app/views/'.$view.'.php')){

            require_once '../app/views/'.$view.'.php';
        }else{
             //View does not exist

            die("View does not exist");

        }

    }


}