<?php

session_start();

define("ABSPATH", __DIR__);

require "../app/core/init.php";

$controller = $_GET['pg'] ?? "home";
$controller = strtolower($controller);


if(file_exists("../app/controllers/".$controller . ".php"))
{
	require "../app/controllers/".$controller . ".php";
}else{
	echo "controller not found";
}
