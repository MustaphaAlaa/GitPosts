<?php 
 function redirect($page){
     header('LOCATION: '.URLROOT.'/'.$page);
 }