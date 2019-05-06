<?php
require_once "Config/Config.php";
require_once "Config/DB.php";

$DB = new DB();
$DB->Get_Connect();

session_start(); 
?>