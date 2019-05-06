<?php
require_once "Config/Config.php";
require_once "Config/HuyDB.php";

$DB = new DB();
$DB->Get_Connect();

session_start(); 
?>