<?php
 class Controller{

    public function model($modelFile){
        if(file_exists('../app/models/'.$modelFile.'.php')){
            require_once('../app/models/'.$modelFile.'.php');
            return new $modelFile;
        }else{
            die('Model File Doesn\'t Exist');
        }
    }

    public function view($viewFile,$data=[]){
        if(file_exists('../app/views/'.$viewFile.'.php')){
            require_once('../app/views/'.$viewFile.'.php');
        }else{
            die('View File Doesn\'t Exist');
        }
    }

 }