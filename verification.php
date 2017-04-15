<?php
  session_start();

  var_dump($_SESSION);

  if(!empty($_SESSION))
  {
    $_SESSION['connecte'] = true;;
  }

?>