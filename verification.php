<?php
	session_start();
	
	var_dump($_SESSION);
	var_dump(session_id());
	
	if(!empty($_SESSION))
	{
		$_SESSION['connecte'] = true;
		session_regenerate_id();
		
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
			// last request was more than 30 minutes ago
			session_unset();     // unset $_SESSION variable for the run-time 
			session_destroy();   // destroy session data in storage
		}
		else{
			$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
		}
		
	}
	
	
	
?>