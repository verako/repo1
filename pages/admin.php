<div class="container adm">
	<div class="row">
        <div class="left col-lg-6  col-md-6 col-sm-6 col-xs-6">
        <h3>Страны</h3>
		    <?php
			//добавляем страну в таблицу 
			//$ins1="insert into Countries(country) values('Аргентина')";
			connect();
			//mysql_query($ins1);
			// $err=mysql_errno();
			// if ($err) {
			// 	echo $err;
			// }
			$sel='select*from countries';
			$res=mysql_query($sel);
			echo "<form action='index.php?page=2' method='post'>";
			echo "<table width='50%'>";
			while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
				echo "<tr>";
				echo "<td>".$row[0]."</td><td>".$row[1]."</td>";
				echo "<td><input type='checkbox' name='cb".$row[0]."'></td>";//вставляем чекбокс и соеденяем имя с id
				echo "</tr>";
			}
			echo "</table>";
			mysql_free_result($res);
			
			echo "<input type='text' name='country'>";
			echo "<input type='submit' name='addcountry' value='Добавить страну'>";
			echo "<input type='submit' name='delcountry' value='Удалить'>";
			echo "</form>";
			//добавление страны
			if (isset($_POST['addcountry'])) {
				$country=trim(htmlspecialchars($_POST['country']));
				if ($country==''){
					exit();
				}
				$ins='insert into Countries (country) values ("'.$country.'")';
				mysql_query($ins);
				echo "<script>window.location.href=document.URL;</script>";
				//header("Location:index.php?page=3");
			}
			//кнопка удаление
			if (isset($_POST['delcountry'])) {
				foreach ($_POST as $k => $v) {//ключь имя элем
					if (substr($k,0,2)=="cb") {//ищем элем с именем начинающимся на cb
						$idc=substr($k, 2);//получаем id удаляя cb с имени чекбокса
						$del='delete from Countries where id='.$idc;//удаляем с таблицы выбраную страну
						mysql_query($del);//выполняем запрос
					}
				}
				echo "<script>window.location.href=document.URL;</script>";//сразу обновляется страница
			}
			?>
		</div>
		<div class="right col-lg-6  col-md-6 col-sm-6 col-xs-6">
		<h3>Города</h3>
		 	<?php 
		 	echo "<form action='index.php?page=2' method='post'>";
		 	$sel="select ci.id, ci.city, co.country from Countries co, Cities ci where ci.countryid=co.id";
		 	$res=mysql_query($sel);
		 	echo "<table width='50%'>";
		 	while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
		 		echo "<tr>";
		 		echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td>";
		 		echo "</tr>";
		 	}
		 	echo "</table>";
		 	mysql_free_result($res);
		 	$res=mysql_query('select * from countries');
		 	echo "<select name='countryname'>";
		 	while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
		 		echo "<option value='".$row[0]."'>".$row[1]."</option>";
		 	}
		 	echo "</select>";
		 	echo "<br>";
		 	echo "<input type='text' name='city'>";
		 	echo "<input type='submit' name='addcity' value='Добавить город'>";
		 	echo "</form>";
		 	//print_r ($_POST);
		 	if (isset($_POST['addcity'])) {
		 		$city=trim(htmlspecialchars($_POST['city']));
		 		if ($city=='') {
		 			exit();
		 		}
		 		$countryid=$_POST['countryname'];
		 		$ins='insert into Cities (city,countryid) values ("'.$city.'",'.$countryid.')';
		 		mysql_query($ins);
		 		//echo mysql_errno();
		 		echo "<script>window.location.href=document.URL;</script>";
		 	}
		 ?>	
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-8  col-md-8 col-sm-12 col-xs-12">
		<h3>Отели</h3>
		<?php 
		 	echo "<form action='index.php?page=2' method='post'>";
		 	$sel="select ci.id, co.country, ci.city from Countries co, Cities ci where ci.countryid=co.id";
		 	$res=mysql_query($sel);
		 	// echo "<table width='80%'>";
		 	// while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
		 	// 	echo "<tr>";
		 	// 	echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td>";
		 	// 	echo "</tr>";
		 	// }
		 	// echo "</table>";
		 	mysql_free_result($res);
		 	$res=mysql_query('select co.id, co.country, ci.id, ci.city from Countries co, Cities ci where ci.countryid=co.id');
		 	
		 	echo "<select name='countrycity'>";
		 	while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
		 		echo "<option value='".$row[2].",".$row[0]."'>".$row[1].','.$row[3]."</option>";
		 	}
		 	echo "</select>";
		 	echo "<br>";
		 	echo "<input type='text' name='hotel' placeholder='Имя отеля'>";
		 	echo "<input type='text' name='stars' placeholder='Звезды'>";
		 	echo "<input type='text' name='cost' placeholder='Цена'>";
		 	echo "<br>";
		 	echo "<textarea name='info' rows='10' cols='80' placeholder='Информация об отеле'></textarea>";
		 	echo "<br>";

		 	echo "<input type='submit' name='addhotel' placeholder='Добавить отель'>";

		 	echo "</form>";
		 	//print_r($_POST);
		 	if (isset($_POST['addhotel'])) {
		 		$hotel=trim(htmlspecialchars($_POST['hotel']));
		 		if ($hotel=='') {
		 			exit();
		 		}
		 		$countrycity=$_POST['countrycity'];
		 		$countrycity1 = explode(",", $countrycity);
		 		//print_r($countrycity1);
		 		$cityid=$countrycity1[0];
		 		$countryid=$countrycity1[1];
		 		$stars=$_POST['stars'];
		 		$cost=$_POST['cost'];
		 		$info=$_POST['info'];
		 		//добавляем отель в таблицу 
				echo $ins='insert into Hotels (hotel,countryid,cityid,stars,cost,info) values ("'.$hotel.'",'.$countryid.','.$cityid.','.$stars.','.$cost.',"'.$info.'")';
		 		mysql_query($ins);
		 		//echo mysql_errno();
		 		echo "<script>window.location.href=document.URL;</script>";
		 	}
		 ?>	
		</div>
		<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
		<h3>Добавить картинки  отелю</h3>
			<form action='index.php?page=2' method='post' enctype="multipart/form-data" style="display:table">
				<select name="hotelid">
					<?php 
						$sel="select ho.id, co.country, ci.city, ho.hotel from Countries co, Cities ci, Hotels ho where ho.countryid=co.id and ho.cityid=ci.id order by co.country";
		 				$res=mysql_query($sel);
		 				while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
		 					echo "<option value='".$row[0]."'>";
		 					echo $row[1].'&nbsp;&nbsp;'.$row[2].'&nbsp;&nbsp;'.$row[3].'</option>';
		 				}
		 				mysql_free_result($res);
					?>
				</select>
				<input type="file" name="file[]" multiple accept="image/*"> <!-- картинки любых форматов -->
				<input type="submit" name="addImage" value="Добавить картинки">
			</form>
			<?php 
				if (isset($_REQUEST['addImage'])) {
					foreach ($_FILES['file']['name'] as $k => $v) {
						if ($_FILES['file']['error'][$k] != 0){
							echo "<script>alert('Размер файла ".$v." превышает допустимый')</script>";
							continue;
						}
						if (move_uploaded_file($_FILES['file']['tmp_name'][$k], 'images/'.$v)) {
							$ins='insert into images(hotelid,imagepath) values ('.$_REQUEST['hotelid'].',"images/'.$v.'")';
							mysql_query($ins);
						}

					}
				}
			?>
		</div>
	</div>
	
</div>