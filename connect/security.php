<?php
	$username = $_SESSION['session_username'];
	$permission = mysqli_query($link, "SELECT `permission` FROM `usertbl` WHERE `username` LIKE '$username'");
	
	$permissionresult =  mysqli_fetch_assoc($permission);
	$permissionresult = $permissionresult['permission'];
?>