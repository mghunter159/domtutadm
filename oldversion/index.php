<?php 
		require_once 'connection.php';
		
		if(!isset($_SESSION["session_username"])):
		//echo '<script>location.replace("http://shop.mghunter.ru/cabinet/login.php");</script>'; exit;
		header("location:login.php");
		//include("login.php");
		else:
?>

<?php 

	$username = $_SESSION['session_username'];
	$permission = mysqli_query($link, "SELECT `permission` FROM `usertbl` WHERE `username` LIKE '$username'");
	
	$permissionresult =  mysqli_fetch_assoc($permission);
	$permissionresult = $permissionresult['permission'];
	
	if ($permissionresult == 1)
	{
		echo '<script>location.replace("/admin");</script>';
		exit;
	}
	
		if ($permissionresult == 2)
	{
		echo '<script>location.replace("/work");</script>';
		exit;
	}
	else 
	{
		echo "Что-то не так с вашим аккаунтом... Обратитесь к системному администратору!";
		exit;
	}
	mysqli_close($link);
?>

<?php endif; ?>