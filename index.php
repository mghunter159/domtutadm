<?php
session_start();
require_once 'connect/connection.php';

$page = explode('?', urldecode($_SERVER['REQUEST_URI'] ))[0];
$_GET = explode('?', urldecode($_SERVER['REQUEST_URI'] ))[1] ?? '';
parse_str($_GET, $_GET);
$page = substr($page, 1);
$pages = explode('/', $page);
$page = $pages[0] ?? '';

switch(mb_strtolower($page)){

case '':
 include('pages/index.php');
 break;
case 'login':
 include('pages/login.php');
 break;
case 'logout':
 include('pages/logout.php');
 break;

case 'admin':
 include('pages/admin.php');
 break;
case 'ainfo':
 include('pages/admin/actions/info.php');
 break;
case 'aclientlist':
 include('pages/admin/actions/clientlist.php');
 break;
case 'aclientadd':
 include('pages/admin/actions/clientadd.php');
 break;
case 'aorderlist':
 include('pages/admin/actions/orderlist.php');
 break;
case 'aorderadd':
 include('pages/admin/actions/orderadd.php');
 break;
case 'aworklist':
 include('pages/admin/actions/worklist.php');
 break;
case 'aworkadd':
 include('pages/admin/actions/workadd.php');
 break;
case 'areportclient':
 include('pages/admin/actions/reportclient.php');
 break;
case 'areportorder':
 include('pages/admin/actions/reportorder.php');
 break;

case 'work':
 include('pages/work.php');
 break;
case 'winfo':
 include('pages/work/actions/info.php');
 break;
case 'wclientlist':
 include('pages/work/actions/clientlist.php');
 break;
case 'wclientadd':
 include('pages/work/actions/clientadd.php');
 break;
case 'worderlist':
 include('pages/work/actions/orderlist.php');
 break;
case 'worderadd':
 include('pages/work/actions/orderadd.php');
 break;
case 'wworklist':
 include('pages/work/actions/worklist.php');
 break;
case 'wworkadd':
 include('pages/work/actions/workadd.php');
 break;
case 'wreportclient':
 include('pages/work/actions/reportclient.php');
 break;
case 'wreportorder':
 include('pages/work/actions/reportorder.php');
 break;

case 'error':
 include('pages/404.php');
 break;
default:
 include('pages/index.php');
 break;
}