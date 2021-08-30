<?php 
	
		if(!isset($_SESSION["session_username"])):
		header("location:/login");
		else:
?>
<?php 
$title = "Отчёт по заказам";
include("pages/admin/header.php"); ?>
<?php

	include("connect/security.php");
	if ($permissionresult == 1)
	
	{
?>
<?php include("pages/admin/menu.php");
header('Content-Type: text/html; charset=utf-8');

 ?>

<div class="container mt-3" style="padding-top:70px;">
<h1 class="text-center">Отчёты</h1>
      
  <?php

$query = "SELECT MAX(`id`) FROM `fullorder`";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$row = mysqli_fetch_row($result);

mysqli_set_charset($link, "utf8");
$today = date("Y-m-d H:i:s");
?>
<div class="container">
<div class="table-one" style=" background:white; border: 3px dotted #777;padding-top: 10px;padding-left: 10px;padding-right: 10px;padding-bottom: 10px;margin-bottom: 10px;">
<div class="container" id="allclient">
	<h3>Отчёт по количеству заказов</h3>
					<table>
						<thead>
							<th width="66%">Строительная компания<br>Block-Home.ru</th>
							<th width="100%"><i>Наш телефон: +7(342)203-88-08<br>Отчёт составлен <?php echo $today ?> по МСК.</i></th>
						</thead>
						<tbody>
						</tbody>
					</table>
					<br>
        <table border="1" class="table table-striped table-bordered">
            <thead>
					
                <th></th>
                <th>Количество</th>

            </thead>
            <tbody>
                        <tr>
                            <td>Всего заказов в базе данных:</td>
                            <td><?php echo $row[0]; ?></td>
                        </tr>
            </tbody>
        </table>
    </div>
	


    <script type="text/javascript" charset="utf-8">

function exportTableToExcel(allcorder1, filename = ''){

    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(allcorder1);
    var tableHTML = '<html><head><meta charset="utf-8"></head><body>' + tableSelect.outerHTML.replace(/ /g, '%20') + '</body></html>';
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
</div>
    <form action="" method="post">
	  <button class="submit" onclick = "exportTableToExcel ('allclient', 'order_data')"> Экспорт данных в Excel </button>
	  <p><i>Внимание, работает не на всех смартфонах!</i></p>
  </form>
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