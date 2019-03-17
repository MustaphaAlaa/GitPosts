<?php

 class Pages extends Controller{


 	public function index(){
 		$data=['welcome' => 'Hello In Our Posting WebSite'];
 		$this->view('pages/index',$data);
 	}

 	public function about(){
 		$data=[
 			'site'=>'This is a posting site using php(oop mvc) sql bootstrap',
 			'me' => 'i\'m a web dev using php sql'
 			];

 		$this->view('pages/about',$data);

 	}
 }