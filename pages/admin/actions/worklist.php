<?php 
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login");
		else:
?>
<?php 
$title = "Список сотрудников";
include("pages/admin/header.php"); ?>
<?php

	include("connect/security.php");
	if ($permissionresult == 1)
	
	{
?>
<?php include("pages/admin/menu.php"); ?>

<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Список сотрудников</h1>
<?php
$query ="SELECT * FROM usertbl";


$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$rows = mysqli_num_rows($result); // количество полученных строк
 //Получаем данные
  $sql = mysqli_query($link, 'SELECT * FROM `usertbl`');
  while ($result = mysqli_fetch_array($sql)) {
	$rows = $result['id'];
  }
  

  //Если переменная Name передана
    if (isset($_POST["redpost"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red'])){
        $sql = mysqli_query($link, "UPDATE `usertbl` SET `full_name` = '{$_POST['full_name']}',`email` = '{$_POST['email']}', `username` = '{$_POST['username']}', `permission` = '{$_POST['perm']}' WHERE `id`={$_GET['red']}");
      }
	  if (isset($_GET['pass'])){
		$password=htmlspecialchars($_POST['password']);
		$hash = md5($password);
        $sql = mysqli_query($link, "UPDATE usertbl SET `password` = '$hash' WHERE `id`={$_GET['pass']}");
      }
      //Если вставка прошла успешно
      if ($sql) {
				echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы изменили данные сотрудника!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/worklist') }, 1600);
					</script>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }

    }
    //Удаляем, если что
    if (isset($_GET['del'])) {
      $sql = mysqli_query($link, "DELETE FROM `usertbl` WHERE `id` = {$_GET['del']}");
      if ($sql) {
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы удалили сотрудника!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/worklist') }, 1600);
					</script>";

      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red'])) {
		
		$sql = mysqli_query($link, "SELECT * FROM `usertbl` WHERE `id`={$_GET['red']}");
      $product = mysqli_fetch_array($sql);
		echo "
		<div class='jumbotron' style='padding-top: 10px;padding-bottom: 52px;'>
		<h2><small>Редактирование сотрудника</small></h2>
	<form action='' method='post'>
	 <div class='form-group'>
		<label for='usr'>Код сотрудника:<br>
			<input disabled class='input form-control' id='id' name='id' type='text' size='50'  value='" , isset($_GET['red']) ? $product['id'] : '' , "'>
		</label>
	  </div>
	  <div class='form-group'>
		<label for='usr'>Новое ФИО:<br>
			<input required class='input form-control' id='full_name' name='full_name' type='text' size='50' placeholder='Мурашов Пётр Николаевич' value='" , isset($_GET['red']) ? $product['full_name'] : '' , "'>
		</label>
	  </div>

	  <div class='form-group'>
		<label for='usr'>Новый емаил:<br>
			<input required class='input form-control' id='email' name='email' type='text' size='50' placeholder='administrator@block-home.ru' value='", isset($_GET['red']) ? $product['email'] : '' ,"'>
		</label>
	  </div>
	  <div class='form-group'>
		<label for='usr'>Новый логин:<br>
			<input required class='input form-control' id='username' name='username' type='text' placeholder='mpetrn' size='50' value='", isset($_GET['red']) ? $product['username'] : '' ,"'>
		</label>
	  </div>
            <div class='form-group'>
		<label> <p style='margin-bottom: 0px;'>Права:</p>
		<select class='input form-control' name='perm' id='perm'>";	
						$so = "SELECT * FROM `usertbl` WHERE `id`={$_GET['red']}";
						$sores = mysqli_query($link, $so); 
						$sores1 = mysqli_fetch_array($sores);
						$s1r2 = $sores1['permission'];
						
						$sql9 = "SELECT * FROM perm";
 
						$result9 = mysqli_query($link, $sql9); 
						while ($result1 = mysqli_fetch_array($result9))
							{

								echo ' <option value="'.$result1['id'].'"';
								 if ($s1r2==$result1['id']) echo 'selected';
								echo '>' .$result1['nazv'].'</option>';

							}
		echo "</select>
		</label>
		</div>
        <input class='btn btn-success float-left' id='redpost' name= 'redpost' type='submit' value='Изменить!'>
		<input readonly class='btn btn-danger float-left' id='closebutton' style='margin-left: 15px;width: 110px;' value='Отменить!'>
	<script language='javascript'>
    document.getElementById('closebutton').onclick = function() 
	{
     location.replace('/worklist')
	 }
	</script>



  </form>
  </div>
";



    }
	 if (isset($_GET['pass'])) {
		
		$sql = mysqli_query($link, "SELECT * FROM `usertbl` WHERE `id`={$_GET['pass']}");
      $product = mysqli_fetch_array($sql);
		echo "
		<div class='jumbotron' style='padding-top: 10px;padding-bottom: 52px;'>
		<h2><small>Редактирование сотрудника</small></h2>
	<form action='' method='post'>
	 <div class='form-group'>
		<label for='usr'>Код сотрудника:<br>
			<input disabled class='input form-control' id='id' name='id' type='text' size='50'  value='" , isset($_GET['pass']) ? $product['id'] : '' , "'>
		</label>
	  </div>
	  <div class='form-group'>
		<label for='usr'>Новый пароль:<br>
			<input required class='input form-control' id='password' name='password' type='password' size='32' placeholder='******' value='" , isset($_GET['pass']) ? $product['password'] : '' , "'>
		</label>
	  </div>

		
        <input class='btn btn-success float-left' id='redpost' name= 'redpost' type='submit' value='Изменить!'>
		<input readonly class='btn btn-danger float-left' id='closebutton' style='margin-left: 15px;width: 110px;' value='Отменить!'>
	<script language='javascript'>
    document.getElementById('closebutton').onclick = function() 
	{
     location.replace('/worklist')
	 }
	</script>



  </form>
  </div>";



    }
  ?>  
  <?php

$sql11 = "SELECT * FROM usertbl";
$result = $link->query($sql11);
$arr_users = [];
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<div class="container">
<div class="table-one">
    <div class="container mt-5">
        <table id="usetTable" class="table table-striped table-bordered">
            <thead>
                <th>Ид сотрудника</th>
                <th>ФИО</th>
                <th>Емаил</th>
				<th>Логин</th>
				<th>Права</th>
				<th></th>
				<th></th>
				<th></th>
            </thead>
            <tbody>
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            <td style="width: 1%;"><?php echo $user['id']; ?></td>
                            <td><?php echo $user['full_name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
							<td><?php echo $user['username']; ?></td>
							<td><?php if ($user['permission'] == 1) { $perm = "Администратор";} else { $perm = "Сотрудник";} echo $perm; ?></td>
							<td class="text-center"> <a href="?del=<?php echo $user['id'];?>" title="Удалить">
								<input type="image" src="/img/actions/delete.png" style="height:20px;"/></a>
							</td> 
							<td class="text-center"><a href="?red=<?php echo $user['id'];?>" title="Редактировать">
								<input type="image" src="/img/actions/edit.png" style="height:30px;"/></a>
							</td>
							<td class="text-center"><a href="?pass=<?php echo $user['id'];?>" title="Сменить пароль">
								<input type="image" src="/img/actions/passwd.png" style="height:20px;"/></a>
							</td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>	
    <script>
        $(document).ready(function() {
            $('#usetTable').DataTable({
				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
				}			
			});
        } );
    </script>
</div>
</div>
</div>
<?php include("pages/admin/footer.php"); ?>
	<?php }
	else {
	 		echo "<script language='javascript'>
     location.replace('/error')
	</script>";
	}
?>
<?php endif; ?>
