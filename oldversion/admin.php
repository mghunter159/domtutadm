<?php 
		require_once 'connection.php';
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login.php");
		else:
?>
<?php include("header.php"); ?>
<?php include("menu.php"); ?>

<div class="jumbotron" style="padding-top:70px;">
  <h1>Привет!</h1> 
  <p>Выбери нужную страницу в меню и начни работать :)</p> 
</div>

<?php include("footer.php"); ?>
<?php endif; ?>