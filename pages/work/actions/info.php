<?php 
		
		if(!isset($_SESSION["session_username"])):
		header("location:/login");
		else:

?>
<?php 
if(!isset($_SESSION["info"]))
{
					echo"<script>
						setTimeout(function() { location.replace('/') });
					</script>";
}
else{
$info1 = $_SESSION["info"];

$title = "Информация о заказе";
include("pages/work/header.php");	
include("pages/work/menu.php");


	include("connect/security.php");
	if ($permissionresult == 2)
	
	{

$sql11 = "SELECT * FROM `fullorder` WHERE `id` = '$info1'";
$result = $link->query($sql11);
$arr_users = [];
?>
<div class="container mt-3" style="padding-top:70px;">
<?php 
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
  //Если переменная Name передана
    if (isset($_POST["redpost"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red'])){
		$square=htmlspecialchars($_POST['square']);
		$date=htmlspecialchars($_POST['date']);
        $sql = mysqli_query($link, "UPDATE `fullorder` SET `type` = '{$_POST['type']}', `type_material` = '{$_POST['type_material']}', `type_size` = '{$_POST['type_size']}', `square` = '$square', `mansard` = '{$_POST['mansard']}', `base` = '{$_POST['base']}', `foundation` = '{$_POST['foundation']}', `type_roof` = '{$_POST['type_roof']}', `coating_roof` = '{$_POST['coating_roof']}', `exterior_finish` = '{$_POST['exterior_finish']}', `warming` = '{$_POST['warming']}', `date` = '$date', `status` = '{$_POST['status']}', `address` = '{$_POST['address']}' WHERE `id`={$_GET['red']}");
		
		if ($sql) {
				echo"
					<div class='blockbackdrop'>
					<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
					<strong>Успешно!</strong> Вы изменили данные заказа!</div></div>
					<script>
						setTimeout(function() { location.replace('/winfo') }, 1600);
					</script>
				";}
	        

       else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
	  }
	  
	    if (isset($_GET['pic'])){

	extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","JPG","JPEG");
    $extension2=array("mp4","avi");
	
	$sql1 = mysqli_query($link, "SELECT * FROM `fullorder` WHERE `id`={$_GET['pic']}");
    $product = mysqli_fetch_array($sql1);
	
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
	
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
				$id = isset($_GET['pic']) ? $product['id'] : '';
				$full_name = $_SESSION['session_username'];
				$rand1=rand(0,1000);
				
                if(in_array($ext,$extension))
                {
                    if(!file_exists("../../photo_gallery/".$file_name))
						
                    { 
						$dir = scandir("../../photo_gallery/".$id);
						if ($dir == true)
						{							
							$newFileName="id".$id."_".date("dmY_H_ia")."_upl_".$full_name."_".$rand1.".".$ext;
							
								/*--------------------------------------*/
									// получаем полезные данные о картинке и водяном знаке
										$image_info = getimagesize($file_tmp);
										$watermark_info = getimagesize('../../img/watemark.png');
  
									// определяем MIME-тип изображения, для выбора соответствующей функции
										$format = strtolower(substr($image_info['mime'], 
										strpos($image_info['mime'], '/') + 1));
  
									// определяем названия функция для создания и сохранения картинки
										$im_cr_func = "imagecreatefrom" . $format;
										$im_save_func = "image" . $format;
  
									// загружаем изображение в php
										$img = $im_cr_func($file_tmp);
  
									// загружаем в php наш водяной знак
										$watermark = imagecreatefrompng('../../img/watemark.png');
  
									// определяем координаты левого верхнего угла водяного знака
										$pos_x = ($image_info[0] - $watermark_info[0]) / 2; 
										$pos_y = ($image_info[1] - $watermark_info[1]) / 2; 
  
									// помещаем водяной знак на изображение
										imagecopy($img, $watermark, $pos_x, $pos_y, 0, 0, $watermark_info[0], 
										$watermark_info[1]);
  
									// сохраняем изображение с уникальным именем
										$im_save_func($img, '../../photo_gallery/'.$id.'/'.$newFileName);
								/*--------------------------------------*/
							
							
						//	move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$id."/".$newFileName);
							
							
							$uplqury = "INSERT INTO `picture` (`id_zakaz`, `pic`, `date`) VALUES ('{$id}', '{$newFileName}', CURDATE())";
							$sqlupl = mysqli_query($link, $uplqury);
							
						}
						else
						{
							mkdir("../../photo_gallery/".$id, 0777, true);
							$newFileName="id".$id."_".date("dmY_H_ia")."_upl_".$full_name."_".$rand1.".".$ext;
								/*--------------------------------------*/
									// получаем полезные данные о картинке и водяном знаке
										$image_info = getimagesize($file_tmp);
										$watermark_info = getimagesize('../../img/watemark.png');
  
									// определяем MIME-тип изображения, для выбора соответствующей функции
										$format = strtolower(substr($image_info['mime'], 
										strpos($image_info['mime'], '/') + 1));
  
									// определяем названия функция для создания и сохранения картинки
										$im_cr_func = "imagecreatefrom" . $format;
										$im_save_func = "image" . $format;
  
									// загружаем изображение в php
										$img = $im_cr_func($file_tmp);
  
									// загружаем в php наш водяной знак
										$watermark = imagecreatefrompng('../../img/watemark.png');
  
									// определяем координаты левого верхнего угла водяного знака
										$pos_x = ($image_info[0] - $watermark_info[0]) / 2; 
										$pos_y = ($image_info[1] - $watermark_info[1]) / 2; 
  
									// помещаем водяной знак на изображение
										imagecopy($img, $watermark, $pos_x, $pos_y, 0, 0, $watermark_info[0], 
										$watermark_info[1]);
  
									// сохраняем изображение с уникальным именем
										$im_save_func($img, '../../photo_gallery/'.$id.'/'.$newFileName);
								/*--------------------------------------*/
							//move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../photo_gallery/".$id."/".$newFileName);
							
							$uplqury = "INSERT INTO `picture` (`id_zakaz`, `pic`, `date`) VALUES ('{$id}', '{$newFileName}', CURDATE())";
							$sqlupl = mysqli_query($link, $uplqury);
						}
						      if ($sqlupl) {
											echo"
												<div class='blockbackdrop'>
												<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
												<strong>Успешно!</strong> Вы добавили фото к заказу!</div></div>
													<script>
														setTimeout(function() { location.replace('/winfo') }, 1600);
													</script>";
											} 
								else {
									echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
									}
                    }
					else
                    {
						echo "  <div class='alert alert-danger'>
						<strong>Внимение!</strong> Произошла неизвестная ошибка при загрузке файла. Обратитесь к Администратору.</div>";
                    }
                }
				if(in_array($ext,$extension2))
                {
                    if(!file_exists("../../video_gallery/".$file_name))
						
                    { 
						$dir = scandir("../../video_gallery/".$id);
						if ($dir == true)
						{
							$newFileName="id".$id."_".date("dmY_H_ia")."_upl_".$full_name."_".$rand1.".".$ext;
							move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../video_gallery/".$id."/".$newFileName);
							
							$uplqury = "INSERT INTO `video` (`id_zakaz`, `video`, `date`) VALUES ('{$id}', '{$newFileName}', CURDATE())";
							$sqlupl = mysqli_query($link, $uplqury);
							
						}
						else
						{
							mkdir("../../video_gallery/".$id, 0700, true);
							$newFileName="id".$id."_".date("dmY_H_ia")."_upl_".$full_name."_".$rand1.".".$ext;
							move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../video_gallery/".$id."/".$newFileName);
							
							$uplqury = "INSERT INTO `video` (`id_zakaz`, `video`, `date`) VALUES ('{$id}', '{$newFileName}', CURDATE())";
							$sqlupl = mysqli_query($link, $uplqury);
						}
						      if ($sqlupl) {
											echo"
												<div class='blockbackdrop'>
												<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
												<strong>Успешно!</strong> Вы добавили видео к заказу!</div></div>
													<script>
														setTimeout(function() { location.replace('/winfo') }, 1600);
													</script>";
											} 
								else {
									echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
									}
                    }
					else
                    {
						echo "  <div class='alert alert-danger'>
						<strong>Внимение!</strong> Произошла неизвестная ошибка при загрузке файла. Обратитесь к Администратору.</div>";
                    }
                }
                if (!(in_array($ext,$extension2)) and !(in_array($ext,$extension)))
                {
					echo "  <div class='alert alert-danger'>
    <strong>Внимение!</strong> Неправильный формат загружаемого файла! Разрешенные форматы: jpeg, jpg, png, mp4, avi, JPG и JPEG.</div>";
                    array_push($error,"$file_name, ");
                }
            }
		}
    }
    if (isset($_GET['pic'])) {
				$sql = mysqli_query($link, "SELECT * FROM `fullorder` WHERE `id`={$_GET['pic']}");
      $product = mysqli_fetch_array($sql);
echo "<div class='jumbotron' style='padding-top: 10px;padding-bottom: 33px;background-color: #cccccc;'>
		<h2><span class='badge badge-secondary'>Добавление фото или видео к заказу</span></h2>
	<form form method='post' enctype='multipart/form-data'>";
	echo "			<div class='form-group'>
				<label for='usr'> <p class='font-weight-bold' style='margin-bottom: 0px;'>Код заказа:</p>
					<input disabled class='input form-control' id='id' name='id' type='text' size='50'  value='" , isset($_GET['pic']) ? $product['id'] : '' , "'>
				</label>
			</div>
		
		
			<div class='form-group'>
				<label for='usr'> <p class='font-weight-bold' style='margin-bottom: 0px;'>Клиент:</p>
					<input disabled class='input form-control' id='id' name='id' type='text' size='50'  value='" , isset($_GET['pic']) ? $product['kod_client'] : '' , "'>
				</label>
			</div><div id='preview'></div>
<input type='file' name='files[]' multiple ><br>

";

	 echo  "
	 <div class='form-group' style='padding-top: 24px;'><input class='btn btn-success float-left' id='redpost' name= 'redpost' type='submit' value='Добавить!'>
		<input readonly class='btn btn-danger float-left' id='closebutton' style='margin-left: 15px;width: 110px;' value='Отменить!'>
	<script language='javascript'>
    document.getElementById('closebutton').onclick = function() 
	{
     location.replace('/winfo')
	 }
	</script>
	</div>";
  echo "</form>
  </div>
"; }

    //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
?>
               <?php if(!empty($arr_users)) { ?>
                 <?php foreach($arr_users as $user) { ?>
					<h1 class="text-center">Просмотр заказа №<?php echo $user['number']; ?></h1>
					<div class="alert alert-success">
  <h3 class="display-6">Управление</h1>
									<a href="?pic=<?php echo $user['id'];?>" data-toggle="tooltip" title="Добавить фото" >
									<button type="button" class="btn btn-success">Добавить фото/видео</button>
									</a>
								
</div>
						<div class="row" style="margin-right: 0px;">
						<div class="col-sm-4">
                          <div class="card" style="width: 95%;left: 10px; display: inline-block;top: 10px; margin-bottom: 20px;">
						      <div class="card-header bg-info text-white"><h4 class="card-title" style="margin-bottom: 0px;">Состояние заказа</h4></div>
							  <div class="card-body text-center" style="background-image: url(/img/ordback.png);">
								<?php echo $user['status']; ?>
							  </div> 
						   </div>
						<hr class="d-sm-none">
                          <div class="card" style="width: 95%;left: 10px;display: inline-block; margin-bottom: 20px;">
						      <div class="card-header bg-info text-white"><h4 class="card-title" style="margin-bottom: 0px;">Полная информация о заказе</h4></div>
							  <div class="card-body" style="background-image: url(/img/ordback.png);">
								<table>
								<tbody>
								<td>
								<kbd style="background-color: #c5c5c5;color: black;">Дата заказа:</kbd><br> <?php echo $user['date']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Тип:</kbd> <br><?php echo $user['type']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Материал:</kbd><br> <?php echo $user['type_material']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Размер м:</kbd><br> <?php echo $user['type_size']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Площадь кв/м2:</kbd><br> <?php echo $user['square']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Мансарда:</kbd><br> <?php echo $user['mansard']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Цоколь:</kbd><br> <?php echo $user['base']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Фундамент:</kbd><br> <?php echo $user['foundation']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Тип крыши:</kbd><br> <?php echo $user['type_roof']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Покрытие крыши:</kbd><br> <?php echo $user['coating_roof']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Внешняя отделка:</kbd><br> <?php echo $user['exterior_finish']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Утепление:</kbd><br><?php echo $user['warming']; ?><br>
								<kbd style="background-color: #c5c5c5;color: black;">Адрес:</kbd><br><?php echo $user['address']; ?>
								</td>
								</tbody>
								</table>
							  </div> 
							  </div> 

  </div>
  
    <div class="col-sm-8">
                          <div class="card" style="width: 95%;left: 10px; display: inline-block;top: 10px;">
						      <div class="card-header bg-info text-white"><h4 class="card-title" style="margin-bottom: 0px;">Фотографии</h4></div>
							  <div class="card-body" style="background-image: url(/img/ordback.png);">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#photo">Фото</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#video">Видео</a>
										</li>
									</ul>

							  <div class="tab-content">
							  <div id="photo" class="container tab-pane active"><br>
							  <div class="row">
								<?php 
									$sql11 = "SELECT * FROM `picture` WHERE `id_zakaz` = '$info1'";
									$result = $link->query($sql11);
									$arr_users = [];
									if ($result->num_rows > 0) {
										$arr_users = $result->fetch_all(MYSQLI_ASSOC);
									} 
									
									    if (isset($_GET['picdel'])) {
											$delpic = mysqli_query($link, "DELETE FROM `picture` WHERE `pic` = '{$_GET['picdel']}'");
												if ($delpic) {
													echo"
													<div class='blockbackdrop'>
													<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
													<strong>Успешно!</strong> Вы удалили заказ!</div></div>
					
														<script>
															setTimeout(function() { location.replace('/winfo') }, 1600);
														</script>";

												} else {
													echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
												}
										}
									?>
									    <?php if(!empty($arr_users)) { ?>
										<?php foreach($arr_users as $user) { ?>
										
											<div class="col-md-4 col-6 thumb" style="position: relative;">
											<a data-fancybox="gallery" href="http://admin.block-home.ru/photo_gallery/<?php echo $info1; ?>/<?php echo $user['pic']; ?>"> 
												<img class="img-fluid" src="http://admin.block-home.ru/photo_gallery/<?php echo $info1; ?>/<?php echo $user['pic']; ?>" class="img-thumbnail"> 
													<a href="?picdel=<?php echo $user['pic'];;?>" data-toggle="tooltip" title="Удалить">
														<button type="button" class="btn btn-danger btn-sm"style="position: absolute;top: 30px;left: 26%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);border: none;cursor: pointer;border-radius: 5px;">Удалить</button>
													</a>
											Дата загрузки: <?php echo $user['date']; ?>
											</a>
											 </div>
										
										<?php } ?>
										<?php } ?>
									</div>
							  </div>
							  
							      <div id="video" class="container tab-pane fade"><br>
							  <div class="row">
								<?php 
									$sql11 = "SELECT * FROM `video` WHERE `id_zakaz` = '$info1'";
									$result = $link->query($sql11);
									$arr_users = [];
									if ($result->num_rows > 0) {
										$arr_users = $result->fetch_all(MYSQLI_ASSOC);
									} 
									    if (isset($_GET['viddel'])) {
											$delpic = mysqli_query($link, "DELETE FROM `picture` WHERE `pic` = '{$_GET['viddel']}'");
												if ($delpic) {
													echo"
													<div class='blockbackdrop'>
													<div class='alert alert-success text-center fixed-bottom shadow-lg p-4 mb-4' style='animation-fill-mode: forwards; animation: show 1s 1;'>
													<strong>Успешно!</strong> Вы удалили заказ!</div></div>
					
														<script>
															setTimeout(function() { location.replace('/winfo') }, 1600);
														</script>";

												} else {
													echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
												}
										}
									?>
									    <?php if(!empty($arr_users)) { ?>
										<?php foreach($arr_users as $user) { ?>
										<div class="col-lg-5 col-md-4 col-6 thumb">
											<video class="img-fluid" controls="controls">
													<source src="http://admin.block-home.ru/video_gallery/<?php echo $info1; ?>/<?php echo $user['video']; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
													Тег video не поддерживается вашим браузером.
													<a href="?viddel=<?php echo $user['pic'];;?>" data-toggle="tooltip" title="Удалить">
														<button type="button" class="btn btn-danger btn-sm"style="position: absolute;top: 30px;left: 26%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);border: none;cursor: pointer;border-radius: 5px;">Удалить</button>
													</a>
											</video>
										</div>
										<?php } ?>
										<?php } ?>
									</div>
							</div>							  
						   </div>

    </div>
</div>
				<?php } ?>
                <?php } ?>

    </div>
<?php 
include("pages/work/footer.php");

?>
	<?php 
}
	else {
	 		echo "<script language='javascript'>
     location.replace('/error')
	</script>";
	}
}

?>
<?php endif; ?>