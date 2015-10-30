<?php
	include("system-db.php");
	
	start_db();

	if (isUserInRole("ADMIN")) {
		header("location: system-admin.php");
		
	} else {
		header("location: equipment.php");
	}
?>
