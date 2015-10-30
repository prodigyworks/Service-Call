<?php 
	require_once("system-mobileheader.php");
?>
<style>
	.container a {
		text-decoration: none;
	}
	
	.container label {
		position: relative;
	}
	
	.container .wrapper {
		width:200px; 
		text-align:left;
	}
	
	.container img {
		display:inline-block;
		position: relative;
	}
</style>
<center class="container">
	<h1><?php echo GetUserName(); ?></h1>
	<br>
<?php
	$userid = getLoggedOnMemberID();
	$qry = "SELECT * FROM {$_SESSION['DB_PREFIX']}customerequipment A 
			WHERE A.memberid = $userid";
	$result = mysql_query($qry);
	$found = false;

	//Check whether the query was successful or not
	if($result) {
		while (($member = mysql_fetch_assoc($result))) {
			$found = true;
			echo "<div class='wrapper'><A href='tel:" . $member['landline'] . "'><IMG width=50 src='images/call.png' />&nbsp;<LABEL style='top-margin:-10px'>" . $member['name'] . "</LABEL></A></div><br>";
		}
	}
	
	if (! $found) {
		$qry = "SELECT * FROM {$_SESSION['DB_PREFIX']}members A 
				WHERE A.member_id = $userid";
		$result = mysql_query($qry);
	
		//Check whether the query was successful or not
		if($result) {
			while (($member = mysql_fetch_assoc($result))) {
				echo "<A href='tel:" . $member['landline'] . "'><IMG src='images/call.png' /></A>";
			}
		}
	}
?>
</center>
<?php
	require_once("system-mobilefooter.php"); 
?>
