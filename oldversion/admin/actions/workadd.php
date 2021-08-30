<?php 
		require_once '../../connection.php';
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login.php");
		else:
?>
<?php 
$title = "Добавление сотрудника";
include("../header.php"); ?>
<?php

	include("../proverka.php");
	if ($permissionresult == 1)
	
	{
?>
<?php include("../menu.php"); ?>
<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Добавление нового сотрудника</h1>
<div class="container blockcenter" style="padding-top:70px;">

<?php 	
	if(isset($_POST["addpost"]))
			{
			$full_name=htmlspecialchars($_POST['full_name']);
			$email=htmlspecialchars($_POST['email']);
			$username=htmlspecialchars($_POST['username']);
			$password=htmlspecialchars($_POST['password']);
			$perm=htmlspecialchars($_POST['perm']);
			$hash = md5($password);
			
			//$sql="INSERT INTO `tovar` (naimen, adres) VALUES('$nazvanie','$adres')";
			$sql="INSERT INTO `usertbl`(`full_name`, `email`, `username`, `password`, `permission`) VALUES ('$full_name','$email','$username','$hash','$perm')";
			
			$result=mysqli_query($link, $sql);
		
				if($result)
				{
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы добавили клиента!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/admin/actions/workadd') }, 1600);
					</script>";
				}
				else 
				{
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-Danger text-center fixed-bottom shadow-lg p-4 mb-4'>
					<strong>Упс!</strong> Что-то пошло не так...</div></div>
					<script>
						setTimeout(function() { location.replace('/admin/actions/workadd') }, 2000);
					</script>";
				}
			}
?>
<form action="" id="addpost" method="post"name="addpost"> 
<div class="form-group">
	<label for="usr">ФИО:<br>
		<input required class="input form-control" id="full_name" name="full_name" type="text" size="50" value="" placeholder="Мурашов Пётр Николаевич">
	</label>
</div>
<div class="form-group">
	<label for="usr">E-mail:<br>
		<input required class="input form-control" id="email" name="email" type="text" size="50" value="" placeholder="administrator@block-home.ru">
	</label>
</div>
<div class="form-group">
	<label for="usr">Логин:<br>
		<input required class="input form-control" id="username" name="username" type="text" placeholder="mpetrn" maxlength="12" type="number" size="50" placeholder="+79991234567">
	</label>
</div>
<div class="form-group">
	<label for="usr">Пароль:<br>
			<input required class='input form-control' id='password' name='password' type='password' size='32' placeholder='******'>
	</label>
</div>
<div class="form-group">
<label> <p style='margin-bottom: 0px;'>Права:</p>
<select class="input form-control" name="perm" id="perm">
<?php

$sql = "SELECT * FROM perm";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['id'].'">'.$result1['nazv'].'</option>';

}
	
?>
</select>
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