<?php
 class Profiles extends Controller{ 
    public function __construct(){
        $this->profileModel = $this->model('Profile');
    }

    public function index($id){
         $posts =$this->profileModel->getPosts($id);
         $data=[
             'posts'=>$posts
         ];
         $this->view('profiles/index',$data);
    }
 }  