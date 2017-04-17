<?php 

require_once "singleton.php";
require_once "procedures.php";
require_once "config.php";

$co = singleton::getInstance();

$requetes = new procedures(/*$co*/);

$requetes->activites($co);
?>