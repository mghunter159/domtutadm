<?php 
		require_once '../../connection.php';
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login.php");
		else:
?>
<?php 
$title = "Добавление клиента";
include("../header.php"); ?>
<?php

	include("../proverka.php");
	if ($permissionresult == 1)
	
	{
?>

<?php include("../menu.php"); ?>
<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Добавление нового клиента</h1>
<div class="container blockcenter" style="padding-top:70px;">

<?php 	
	if(isset($_POST["addpost"]))
			{
			$fio=htmlspecialchars($_POST['fio']);
			$adres=htmlspecialchars($_POST['adres']);
			$phone=htmlspecialchars($_POST['phone']);
			$login=htmlspecialchars($_POST['login']);
			$date=htmlspecialchars($_POST['date']);
			
			
			$sql="INSERT INTO `client`(`fio`, `adres`, `phone`, `login`,  `date`) VALUES ('$fio','$adres','$phone','$login','$date')";
			
			$result=mysqli_query($link, $sql);
		
				if($result)
				{
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы добавили клиента!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/admin/actions/clientadd') }, 1600);
					</script>";
				}
				else 
				{
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-Danger text-center fixed-bottom shadow-lg p-4 mb-4'>
					<strong>Упс!</strong> Что-то пошло не так...</div></div>";
				}
			}
?>
<form action="" id="addpost" method="post"name="addpost"> 
<div class="form-group">
	<label for="usr">ФИО:<br>
		<input required class="input form-control" id="fio" name="fio" type="text" pattern="^[А-Яа-яЁё\s]+$" size="50" value="" placeholder="Мурашов Пётр Николаевич">
	</label>
</div>
<div class="form-group">
	<label for="usr">Адрес:<br>
		<input required class="input form-control" id="adres" name="adres" type="text" size="50" value="" placeholder="Москва, ул. Краснополянская 20А">
	</label>
</div>
<div class="form-group">
	<label for="usr">Телефон:<br>
		<input required class="input form-control" id="phone" name="phone" type="tel" pattern="^\+7\d{3}\d{7}$" value="+7" maxlength="12" type="number" size="50" placeholder="+79991234567">
	</label>
</div>
<div class="form-group">
	<label for="usr">Логин:<br>
		<input required class="input form-control" id="login" name="login" type="text" size="50" value="" placeholder="pmurashov">
	</label>
</div>
<div class="form-group">
	<label for="usr">Дата добавления:<br>
		<input required autocomplete="on" class='input form-control' id='date' name='date' type='date' size='50'>
	</label>
</div>
<input class="btn btn-success float-right" id="addpost" name= "addpost" type="submit" style="width: 169px;" value="Добавить!">

</form>
</div>
</div>
<?php include("../footer.php"); ?>
	<?php }
	else {
	 		echo "<script language='javascript'>
     location.replace('/error')
	</script>";
	}
?>
<?php endif; ?>