<?php 
		require_once '../../connection.php';

		if(!isset($_SESSION["session_username"])):
		header("location:/login.php");

		else:
?>
<?php 
$title = "Добавление заказа";
include("../header.php"); ?>
<?php

	include("../proverka.php");
	if ($permissionresult == 1)
	
	{
?>
<?php include("../menu.php"); ?>
<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Добавление нового заказа</h1>
<div class="container-fluid mt-3" style="padding-top:70px;">

<?php
	
	if(isset($_POST["addpost"]))
			{
			$kod_client=htmlspecialchars($_POST['kod_client']);
			$type=htmlspecialchars($_POST['type']);
			$type_material=htmlspecialchars($_POST['type_material']);
			$type_size=htmlspecialchars($_POST['type_size']);
			$square=htmlspecialchars($_POST['square']);
			$mansarda=htmlspecialchars($_POST['mansarda']);
			$tsokol=htmlspecialchars($_POST['tsokol']);
			$fundament=htmlspecialchars($_POST['fundament']);
			$type_roof=htmlspecialchars($_POST['type_roof']);
			$pokrytie_roof=htmlspecialchars($_POST['pokrytie_roof']);
			$vneshnya_otdelka=htmlspecialchars($_POST['vneshnya_otdelka']);
			$yteplenie=htmlspecialchars($_POST['yteplenie']);
			$date=htmlspecialchars($_POST['date']);
			$adres=htmlspecialchars($_POST['adres']);
			$status=htmlspecialchars($_POST['status']);
			
			
			$number=str_pad(rand(0,99999),5,"0",STR_PAD_LEFT);
			
			$sql="INSERT INTO `fullzakaz`(`kod_client`, `type`, `type_material`, `type_size`, `square`, `mansarda`, `tsokol`, `fundament`, `type_roof`, `pokrytie_roof`, `vneshnya_otdelka`, `yteplenie`, `date`, `adres`, `status`, `number`) VALUES ('$kod_client','$type','$type_material','$type_size','$square','$mansarda','$tsokol','$fundament','$type_roof','$pokrytie_roof','$vneshnya_otdelka','$yteplenie','$date', '$adres','$status','$number')";
			
			$result=mysqli_query($link, $sql);
		
				if($result)
				{
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы добавили заказ!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/admin/actions/orderadd') }, 1600);
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
<select class="input form-control" name="kod_client" id="kod_client">
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
<select class="input form-control" name="mansarda" id="mansarda">
<?php

$sql = "SELECT * FROM mansarda";
 
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
<select class="input form-control" name="tsokol" id="tsokol">
<?php

$sql = "SELECT * FROM tsokol";
 
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
<input required autocomplete="on" class='input form-control' id='adres' name='adres' type='text' size='50'>
</label>
</div>
</div>
<div class='col-sm-5'>

<div class="form-group">
<label> <p class='font-weight-bold' style='margin-bottom: 0px;'>Фундамент:</p>
<select class="input form-control" name="fundament" id="fundament">
<?php

$sql = "SELECT * FROM fundament";
 
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
<select class="input form-control" name="pokrytie_roof" id="pokrytie_roof">
<?php

$sql = "SELECT * FROM pokrytie_roof";
 
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
<select class="input form-control" name="vneshnya_otdelka" id="vneshnya_otdelka">
<?php

$sql = "SELECT * FROM vneshnya_otdelka";
 
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
<select class="input form-control" name="yteplenie" id="yteplenie">
<?php

$sql = "SELECT * FROM yteplenie";
 
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
<?php include("../footer.php"); ?>
	<?php }
	else {
	 		echo "<script language='javascript'>
     location.replace('/error')
	</script>";
	}
?>
<?php endif; ?>