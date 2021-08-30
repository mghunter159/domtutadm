<?php 
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login");
		else:
?>
<?php 
$title = "Список клиентов";
include("pages/work/header.php"); ?>
<?php

	include("connect/security.php");
	if ($permissionresult == 2)
	
	{
?>
<?php include("pages/work/menu.php"); ?>

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
				<th>Дата добавления</th>
            </thead>
            <tbody>
                <?php if(!empty($arr_users)) { ?>
                    <?php foreach($arr_users as $user) { ?>
                        <tr>
                            <td><?php echo $user['code_client']; ?></td>
                            <td><?php echo $user['fio']; ?></td>
                            <td><?php echo $user['address']; ?></td>
							<td><?php echo $user['phone']; ?></td>
							<td><?php echo $user['date']; ?></td>
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
<?php include("pages/work/footer.php"); ?>
	<?php }
	else {
            echo "<script language='javascript'>
     location.replace('/error')
    </script>";
	}
?>
<?php endif; ?>
