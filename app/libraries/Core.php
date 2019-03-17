<?php
 class Core{
     protected $currentController = 'Pages';
     protected $currentMethod = "index";
     protected $pages = [];

    public function __construct(){
        $url = $this->getUrl();

        //Check if Controller Exists
        if(file_exists('../app/controller/'.ucwords($url[0]).'.php')){
            //Set it if exist
            $this->currentController = ucwords($url[0]);
            //unset $url[0]
            unset($url[0]);
        }

        //Require the Controller
        require_once('../app/controller/'.$this->currentController.'.php');
        $this->currentController = new  $this->currentController;

        //Second Part of url
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                //Set The method 
                $this->currentMethod = $url[1];
                //Unset method $url[1]
                unset($url[1]);
            }
        }



      



        //Get params
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }   

     public function getUrl(){
         if(isset($_GET['url'])){
             $url = $_GET['url']; 
             $url = rtrim($url,'/');
             $url = filter_var($url,FILTER_SANITIZE_URL);
             $url = explode('/',$url);
             return $url;
         }
     }

 }