<?php 		
		if(!isset($_SESSION["session_username"])):
		//echo '<script>location.replace("http://shop.mghunter.ru/cabinet/login.php");</script>'; exit;
		header("Location: /login");
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
		header("Location: /admin");
		exit;
	}
	
		if ($permissionresult == 2)
	{
		header("Location: /work");
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