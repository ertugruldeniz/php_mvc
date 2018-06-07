<?php
/**
 * Created by PhpStorm.
 * User: Ertug
 * Date: 6.06.2018
 * Time: 02:25
 */

class Pages extends Controller {

    public function __construct(){
        $this->postModel = $this->model('Post');
    }

    public function index(){
        $posts=$this->postModel->getPosts();
        $title=$this->postModel->getTitle();
        $data= [
            "title"=>"Welcome",
            "posts"=>$posts,
            "deneme"=>$title
        ];
        $this->view('pages/index',$data);
    }

    public function about(){
        $data= ["title"=>"About",
            "description"=>"Açıklama"];
        $this->view('pages/about',$data);
    }
}