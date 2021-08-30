<?php session_start(); ?>
<?php 
		require_once '../connection.php';
		
		if(!isset($_SESSION["session_username"])):
		header("location:../login.php");
		else:
?>
<?php 
$title = "Главная страница";
include("../header.php"); ?>
<?php

	include("proverka.php");
	if ($permissionresult == 1)
	
	{ 
	
?>


<?php include("menu.php"); ?>

<div class="container" style="padding-top: 90px;">

  <h1>Быстрый доступ</h1>
  
  <div class="card" style="width:280px;display: inline-block; left: 10px;">
    <img class="card-img-top" src="/img/client.png" alt="Card image"  style="width: 100%;padding-left: 10px;padding-right: 10px;background: #bababa;padding-bottom: 5px;padding-top: 5px;">
    <div class="card-body">
      <h4 class="card-title">Клиенты</h4>
      <p class="card-text">Быстрый досутп к управлению клиентами</p>
      <a href="/admin/actions/clientlist" class="btn btn-primary">Список</a>
	  <a href="/admin/actions/clientadd" class="btn btn-primary">Добавить</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
	<img class="card-img-top" src="/img/order.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-top: 10px;padding-right: 10px;background: #bababa;">
    <div class="card-body">
      <h4 class="card-title">Заказы</h4>
      <p class="card-text">Быстрый досутп к управлению заказами</p>
      <a href="/admin/actions/orderlist" class="btn btn-primary">Список</a>
	  <a href="/admin/actions/orderadd" class="btn btn-primary">Добавить</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
	<img class="card-img-top" src="/img/work.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-right: 10px;background: #bababa;padding-bottom: 10px;">
    <div class="card-body">
      <h4 class="card-title">Сотрудники</h4>
      <p class="card-text">Быстрый досутп к управлению сотрудниками</p>
      <a href="/admin/actions/worklist" class="btn btn-primary">Список</a>
	  <a href="/admin/actions/workadd" class="btn btn-primary">Добавить</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
    <img class="card-img-top" src="/img/report.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-top: 10px;padding-right: 10px;background: #bababa;">
    <div class="card-body">
      <h4 class="card-title">Отчёты</h4>
      <p class="card-text">Быстрый досутп к просмотрам отчётов</p>
      <a href="/admin/actions/reportclient" class="btn btn-primary">Клиенты</a>
	  <a href="/admin/actions/reportorder" class="btn btn-primary">Заказы</a>
    </div>
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