<?php
	mysqli_close($link);
	unset($_SESSION['session_username']);
	session_destroy();
	header("location:/login");
	?>