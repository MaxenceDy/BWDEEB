<?php
//Verifier si connecté ou non
session_start();
$_SESSION['connect']="";
$_SESSION['email']="";
$_SESSION['name']=="";
session_destroy(session_id());
header ("Location:index.php");