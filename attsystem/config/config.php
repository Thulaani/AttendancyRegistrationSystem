<?php
// user config
session_start();
error_reporting(E_ALL ^ E_NOTICE);
define("DB_SERVER", "localhost");

define("DB_DATABASE", "register");
define("DB_USERNAME", "boss");
define("DB_PASSWORD", "tavonga1");


define("ROOT", "http://localhost/AttSytem/");
define("BaseROOT", "http://localhost/AttSytem/");


//change post data
foreach ($_POST as $key => $value) {
    if(!is_array($value)){
      $_POST[$key] = htmlspecialchars($value, ENT_QUOTES);
    }
}
?>