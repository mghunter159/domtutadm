<?php 
		
		if(!isset($_SESSION["session_username"])):
		header("location: /login");
		else:
?>
<?php 
$title = "Главная страница";
include("admin/header.php"); ?>
<?php

	include("connect/security.php");
	if ($permissionresult == 1)
	
	{ 
	
?>


<?php include("admin/menu.php"); ?>

<div class="container" style="padding-top: 90px;">

  <h1>Быстрый доступ</h1>
  
  <div class="card" style="width:280px;display: inline-block; left: 10px;">
    <img class="card-img-top" src="/img/client.png" alt="Card image"  style="width: 100%;padding-left: 10px;padding-right: 10px;background: #bababa;padding-bottom: 5px;padding-top: 5px;">
    <div class="card-body">
      <h4 class="card-title">Клиенты</h4>
      <p class="card-text">Быстрый досутп к управлению клиентами</p>
      <a href="/aclientlist" class="btn btn-primary">Список</a>
	  <a href="/aclientadd" class="btn btn-primary">Добавить</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
	<img class="card-img-top" src="/img/order.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-top: 10px;padding-right: 10px;background: #bababa;">
    <div class="card-body">
      <h4 class="card-title">Заказы</h4>
      <p class="card-text">Быстрый досутп к управлению заказами</p>
      <a href="/aorderlist" class="btn btn-primary">Список</a>
	  <a href="/aorderadd" class="btn btn-primary">Добавить</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
	<img class="card-img-top" src="/img/work.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-right: 10px;background: #bababa;padding-bottom: 10px;">
    <div class="card-body">
      <h4 class="card-title">Сотрудники</h4>
      <p class="card-text">Быстрый досутп к управлению сотрудниками</p>
      <a href="/aworklist" class="btn btn-primary">Список</a>
	  <a href="/aworkadd" class="btn btn-primary">Добавить</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
    <img class="card-img-top" src="/img/report.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-top: 10px;padding-right: 10px;background: #bababa;">
    <div class="card-body">
      <h4 class="card-title">Отчёты</h4>
      <p class="card-text">Быстрый досутп к просмотрам отчётов</p>
      <a href="/areportclient" class="btn btn-primary">Клиенты</a>
	  <a href="/areportorder" class="btn btn-primary">Заказы</a>
    </div>
  </div>
  </div>

<?php include("admin/footer.php"); ?>

	<?php }
	else {
    header("location: /error");
	}
?>

<?php endif; ?>