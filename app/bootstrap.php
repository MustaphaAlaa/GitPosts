<?php
//include config files
include_once('config/Config.php');

//include helpers files
include_once('helpers/url_helper.php');
include_once('helpers/session_flash_helper.php');

//Include lubraries
spl_autoload_register(function($className){
    include_once('libraries/'.$className.'.php');
});
