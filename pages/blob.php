<?php  
include_once('functions.php');
// if ( isset( $_POST['login'] ) ) {
//   // Здесь $id номер изображения
//   $login = $_POST['login'];
  connect();
  $res=mysql_query('select avatar from Users  where login="verako"');
    // Выполняем запрос и получаем файл
    $line=mysql_fetch_row($res);
	$pic=$line[0];
      // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
    header("Content-type: image/*");
      // И  передаем сам файл
    echo $pic;
    
 // }

?>