<?php
/**
 * Created by PhpStorm.
 * User: Ertug
 * Date: 6.06.2018
 * Time: 02:25
 */

class Pages extends Controller {

    public function __construct(){

    }

    public function index(){
        $data= [
            "title"=>"Welcome",
            "description"=>"Açıklama"];
        $this->view('pages/index',$data);
    }

    public function about(){
        $this->view('pages/about');
    }
}