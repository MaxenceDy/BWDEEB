<?php 

require_once "singleton.php";
require_once "procedures.php";
require_once "config.php";

$instance = singleton::getInstance();
$co = $instance::getBDD();

$requetes = new procedures(/*$co*/);

$requetes->activites($co);
?>