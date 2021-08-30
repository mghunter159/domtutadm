<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="/">Личный кабинет</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
	<li class="nav-item">
      <a class="nav-link" href="/">Главная</a>
    </li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Клиенты
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/admin/actions/clientlist">Список всех клиентов</a>
        <a class="dropdown-item" href="/admin/actions/clientadd">Добавить нового клиента</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Заказы
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/admin/actions/orderlist">Список всех заказов</a>
        <a class="dropdown-item" href="/admin/actions/orderadd">Добавить новый заказ</a>
      </div>
    </li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Сотрудники
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/admin/actions/worklist">Список всех сотрудников</a>
        <a class="dropdown-item" href="/admin/actions/workadd">Добавить нового сотрудника</a>
      </div>
    </li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Отчёты
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/admin/actions/reportclient">Все клиенты</a>
        <a class="dropdown-item" href="/admin/actions/reportorder">Все заказы</a>
      </div>
    </li>
   
    </ul>
	<ul class="navbar-nav my-2 my-lg-0">
	<div style="margin-bottom: -28px;">
	<img src="/img/avatar.png" class="mr-3 mt-3 rounded-circle" style="width:50px;height: 50px;margin-top: 0px !important;display: inline-block;padding-top: 0px;margin-bottom: 26px;">
	<p class="text-white" style="margin-bottom: 0px;padding-right: 10px; display: inline-block;">Добро пожаловать,<br> <?php echo ($_SESSION['session_fullname']);?>!</p>
	</div>
	 <li class="nav-item ">
		<a class="nav-link" href="/logout.php" style="padding-top: 6px;padding-bottom: 0px;"><button type="button" class="btn btn-light">Выйти</button></a>
	 </li>	
	</ul>
  </div>  
  
</nav>

