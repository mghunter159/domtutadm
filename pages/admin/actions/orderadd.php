<?php 

		if(!isset($_SESSION["session_username"])):
		header("location:/login");

		else:
?>
<?php 
$title = "Добавление заказа";
include("pages/admin/header.php"); ?>
<?php

	include("connect/security.php");
	if ($permissionresult == 1)
	
	{
?>
<?php include("pages/admin/menu.php"); ?>
<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Добавление нового заказа</h1>
<div class="container-fluid mt-3" style="padding-top:70px;">

<?php
	
	if(isset($_POST["addpost"]))
			{
			$code_client=htmlspecialchars($_POST['code_client']); //код клиента
			$type=htmlspecialchars($_POST['type']); // тип
			$type_material=htmlspecialchars($_POST['type_material']); // тип материал
			$type_size=htmlspecialchars($_POST['type_size']); // тип разиер
			$square=htmlspecialchars($_POST['square']); // площадь
			$mansard=htmlspecialchars($_POST['mansard']); // мансарда
			$base=htmlspecialchars($_POST['base']); // цоколь
			$foundation=htmlspecialchars($_POST['foundation']); // фундамент
			$type_roof=htmlspecialchars($_POST['type_roof']); // тип крыша
			$coating_roof=htmlspecialchars($_POST['coating_roof']); // покрытие крыши
			$exterior_finish=htmlspecialchars($_POST['exterior_finish']); //внешняя отделка
			$warming=htmlspecialchars($_POST['warming']); // утепление
			$date=htmlspecialchars($_POST['date']); //дата
			$address=htmlspecialchars($_POST['address']); // адресс
			$status=htmlspecialchars($_POST['status']); // статус 
			
			
			$number=str_pad(rand(0,99999),5,"0",STR_PAD_LEFT);
			
			$sql="INSERT INTO `fullorder`(`code_client`, `type`, `type_material`, `type_size`, `square`, `mansard`, `base`, `foundation`, `type_roof`, `coating_roof`, `exterior_finish`, `warming`, `date`, `address`, `status`, `number`) VALUES ('$code_client','$type','$type_material','$type_size','$square','$mansard','$base','$foundation','$type_roof','$coating_roof','$exterior_finish','$warming','$date', '$address','$status','$number')";
			
			$result=mysqli_query($link, $sql);
			mysqli_close($link);
				if($result)
				{
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы добавили заказ!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/aorderadd') }, 1600);
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
<div class='row'>
<div class='col-sm-5'>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Клиент:</p>
<select class="input form-control" name="code_client" id="code_client">
<?php

$sql = "SELECT * FROM client";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['fio'].'">'.$result1['fio'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Тип:</p>
<select class="input form-control" name="type" id="type">
<?php

$sql = "SELECT * FROM type";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Материал:</p>
<select class="input form-control" name="type_material" id="type_material">
<?php

$sql = "SELECT * FROM type_material";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['material'].'">'.$result1['material'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Размер:</p>
<select class="input form-control" name="type_size" id="type_size">
<?php

$sql = "SELECT * FROM type_size";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['size'].'">'.$result1['size'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Площадь:</p>
	<input required class='input form-control' id='square' name='square' pattern='\d' min='0' type='number' size='50' value=''>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Мансарда:</p>
<select class="input form-control" name="mansard" id="mansard">
<?php

$sql = "SELECT * FROM mansard";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Цоколь:</p>
<select class="input form-control" name="base" id="base">
<?php

$sql = "SELECT * FROM base";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>
<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Адрес:</p>
<input required autocomplete="on" class='input form-control' id='address' name='address' type='text' size='50'>
</label>
</div>
</div>
<div class='col-sm-5'>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Фундамент:</p>
<select class="input form-control" name="foundation" id="foundation">
<?php

$sql = "SELECT * FROM foundation";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Тип крыши:</p>
<select class="input form-control" name="type_roof" id="type_roof">
<?php

$sql = "SELECT * FROM type_roof";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Покрытие крыши:</p>
<select class="input form-control" name="coating_roof" id="coating_roof">
<?php

$sql = "SELECT * FROM coating_roof";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Внешняя отделка:</p>
<select class="input form-control" name="exterior_finish" id="exterior_finish">
<?php

$sql = "SELECT * FROM exterior_finish";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Утепление:</p>
<select class="input form-control" name="warming" id="warming">
<?php

$sql = "SELECT * FROM warming";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Дата:</p>
<input required autocomplete="on" class='input form-control' id='date' name='date' type='date' size='50'>
</label>
</div>



<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Статус заказа:</p>
<select class="input form-control" name="status" id="status">
<?php

$sql = "SELECT * FROM status";
 
$result = mysqli_query($link, $sql); 

while ($result1 = mysqli_fetch_array($result))
{

echo ' <option value="'.$result1['type'].'">'.$result1['type'].'</option>';

}
	
?>
</select>
</label>
</div>
<div class="form-group" style="padding-top: 24px;">
<input class="btn btn-success float-left" id="addpost" name= "addpost" type="submit" style="width: 169px;" value="Добавить!">
</div>

</div>
</div>
</form>
<?php include("pages/admin/footer.php"); ?>
	<?php }
	else {
	 		echo "<script language='javascript'>
     location.replace('/error')
	</script>";
	}
?>
<?php endif; ?>