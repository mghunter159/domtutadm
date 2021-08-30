<?php 
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login");
		else:
?>
<?php 
$title = "Список клиентов";
include("pages/admin/header.php"); ?>
<?php

	include("connect/security.php");
	if ($permissionresult == 1)
	
	{
?>
<?php include("pages/admin/menu.php"); ?>

<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Список клиентов</h1>
<?php

$query ="SELECT * FROM client";


$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$rows = mysqli_num_rows($result); // количество полученных строк
 //Получаем данные
  $sql = mysqli_query($link, 'SELECT * FROM `client`');
  while ($result = mysqli_fetch_array($sql)) {
	$rows = $result['code_client'];
  }
  

  //Если переменная Name передана
    if (isset($_POST["redpost"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red'])){
        $sql = mysqli_query($link, "UPDATE `client` SET `fio` = '{$_POST['fio']}',`address` = '{$_POST['address']}',`login` = '{$_POST['login']}', `phone` = '{$_POST['phone']}' WHERE `code_client`={$_GET['red']}");
      }
      //Если вставка прошла успешно
      if ($sql) {
				echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы изменили данные клиента!</div></div>
					
					<script>
						setTimeout(function() { location.replace('/aclientlist') }, 1600);
					</script>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }
    //Удаляем, если что
    if (isset($_GET['del'])) {
      $sql = mysqli_query($link, "DELETE FROM `client` WHERE `code_client` = {$_GET['del']}");
      if ($sql) {
					echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы удалили клиента!</div></div>
					<script>
						setTimeout(function() { location.replace('/aclientlist') }, 1600);
					</script>";

      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red'])) {
		
		$sql = mysqli_query($link, "SELECT * FROM `client` WHERE `code_client`={$_GET['red']}");
      $product = mysqli_fetch_array($sql);
		echo "
		<div class='jumbotron' style='padding-top: 10px;padding-bottom: 52px;'>
		<h2><small>Редактирование клиента</small></h2>
	<form action='' method='post'>
	 <div class='form-group'>
		<label for='usr'> Код клиента:<br>
			<input disabled class='input form-control' id='code_client' name='code_client' type='text' size='50'  value='" , isset($_GET['red']) ? $product['code_client'] : '' , "'>
		</label>
	  </div>
	  <div class='form-group'>
		<label for='usr'> Новое ФИО:<br>
			<input required class='input form-control' id='fio' name='fio' type='text' size='50' placeholder='Мурашов Пётр Николаевич' value='" , isset($_GET['red']) ? $product['fio'] : '' , "'>
		</label>
	  </div>
	  <div class='form-group'>
		<label for='usr'>Новый адрес:<br>
			<input required class='input form-control' id='address' name='address' type='text' size='50' placeholder='Москва, ул. Краснополянская 20А' value='", isset($_GET['red']) ? $product['address'] : '' ,"'>
		</label>
	  </div>
	   <div class='form-group'>
		<label for='usr'>Новый логин:<br>
			<input required class='input form-control' id='login' name='login' type='text' size='50' placeholder='pmurashov' value='", isset($_GET['red']) ? $product['login'] : '' ,"'>
		</label>
	  </div>
	  <div class='form-group'>
		<label for='usr'>Новый телефон:<br>
			<input required class='input form-control' id='phone' name='phone' type='tel' pattern='^\+7\d{3}\d{7}$' size='50' value='", isset($_GET['red']) ? $product['phone'] : '' ,"'>
		</label>
	  </div>
      
        <input class='btn btn-success float-left' id='redpost' name= 'redpost' type='submit' value='Изменить!'>
		<input readonly class='btn btn-danger float-left' id='closebutton' style='margin-left: 15px;width: 110px;' value='Отменить!'>
	<script language='javascript'>
    document.getElementById('closebutton').onclick = function() 
	{
     location.replace('/aclientlist')
	 }
	</script>



  </form>
  </div>
";



    }
  ?>  
  <?php

$sql11 = "SELECT * FROM client";
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
                <th>Ид клиента</th>
                <th>ФИО</th>
                <th>Адрес</th>
				<th>Телефон</th>
				<th>Логин</th>
				<th>Дата добавления</th>
				<th></th>
				<th></th>
            </thead>
            <tbody>
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            <td><?php echo $user['code_client']; ?></td>
                            <td><?php echo $user['fio']; ?></td>
                            <td><?php echo $user['address']; ?></td>
							<td><?php echo $user['phone']; ?></td>
							<td><?php echo $user['login']; ?></td>
							<td><?php echo $user['date']; ?></td>
							<td class="text-center"> <a href="?del=<?php echo $user['code_client'];?>" title="Удалить">
								<input type="image" src="/img/actions/delete.png" style="height:25px;"/></a>
							</td> 
							<td class="text-center"><a href="?red=<?php echo $user['code_client'];?>" title="Редактировать">
								<input type="image" src="/img/actions/edit.png" style="height:30px;"/></a>
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

?>
<?php endif; ?>
