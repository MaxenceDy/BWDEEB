<?php
	session_start();
	
	var_dump($_SESSION);
	var_dump(session_id());
	
	if(!empty($_SESSION))
	{
		$_SESSION['connecte'] = true;
		session_regenerate_id();
	}

?>