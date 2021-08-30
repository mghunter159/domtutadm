<?php 

		if(!isset($_SESSION["session_username"])):
    header("location: /login");
		else:
?>
<?php 
$title = "Главная страница";
include("work/header.php"); ?>
<?php

  include("connect/security.php");
	if ($permissionresult == 2)
	
	{
?>


<?php include("work/menu.php"); ?>

<div class="container" style="padding-top: 90px;">

  <h1>Быстрый доступ</h1>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
    <img class="card-img-top" src="/img/client.png" alt="Card image"  style="width: 100%;padding-left: 10px;padding-right: 10px;background: #bababa;padding-bottom: 5px;padding-top: 5px;">
    <div class="card-body">
      <h4 class="card-title">Клиенты</h4>
      <p class="card-text">Быстрый досутп к управлению клиентами</p>
      <a href="/wclientlist" class="btn btn-primary">Список</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
	<img class="card-img-top" src="/img/order.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-top: 10px;padding-right: 10px;background: #bababa;">
    <div class="card-body">
      <h4 class="card-title">Заказы</h4>
      <p class="card-text">Быстрый досутп к управлению заказами</p>
      <a href="/worderlist" class="btn btn-primary">Список</a>
    </div>
  </div>
  
  <div class="card" style="width:280px;display: inline-block;left: 10px;">
    <img class="card-img-top" src="/img/report.png" alt="Card image" style="width: 100%;padding-left: 10px;padding-top: 10px;padding-right: 10px;background: #bababa;">
    <div class="card-body">
      <h4 class="card-title">Отчёты</h4>
      <p class="card-text">Быстрый досутп к просмотрам отчётов</p>
      <a href="/wreportclient" class="btn btn-primary">Клиенты</a>
	  <a href="/wreportorder" class="btn btn-primary">Заказы</a>
    </div>
  </div>
  </div>

<?php include("work/footer.php"); ?>

	<?php }
	else {
	 		echo "<script language='javascript'>
     location.replace('/error')
	</script>";
	}
?>

<?php endif; ?>