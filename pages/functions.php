<?
$user='root';
$pass='123456';
$host='localhost';
$dbname='tur';
//подключение к бд
function connect(){
	global $user,$pass,$host,$dbname;
	$link=mysql_connect($host,$user,$pass) or die('error server connect');
	mysql_select_db($dbname) or die('не удалось подключиться к бд');
	mysql_query("set names 'utf8'");
}
 function register($name, $pass, $email, $image){
 	$name=trim(htmlspecialchars($name));
 	$pass=trim(htmlspecialchars($pass));
 	$email=trim(htmlspecialchars($email));
 	$file=fopen($image,'rb');//читаем содержимое бинарного файла
 	$binary=fread($file, filesize($image));
 	$binary=addslashes($binary);
 	fclose($file);//закрыли файл
 	if ($name=="" || $pass=="" || $email=="") {
 		echo "<h3 style='color:red'>Не все поля заполнены</h3>";
 		return false;
 	}
 	if (strlen($name)<3 || strlen($name)>30) {
 		echo "<h3 style='color:red'>Не правильная длинна строки</h3>";
 		return false;
 	}
 	if (strlen($pass)<3 || strlen($pass)>30) {
 		echo "<h3 style='color:red'>Не правильная длинна строки</h3>";
 		return false;
 	}
 	//в таблицу ролей добавить руками роли 2 - user, 1 - admin
 	$ins='insert into users (login, pass, email, roleid, avatar) values
 	("'.$name.'","'.md5($pass).'","'.$email.'",2,"'.$binary.'")';
 	connect();
 	mysql_query($ins);
 	return true;
 }


 function login($name, $pass){
 	$name=trim(htmlspecialchars($name));
 	$pass=trim(htmlspecialchars($pass));
 	if ($name=="" || $pass=="") {
 		echo "<h3 style='color:red'>Не все поля заполнены</h3>";
 		return false;
 	}
 	if (strlen($name)<3 || strlen($name)>30) {
 		echo "<h3 style='color:red'>Не правильная длинна строки</h3>";
 		return false;
 	}
 	if (strlen($pass)<3 || strlen($pass)>30) {
 		echo "<h3 style='color:red'>Не правильная длинна строки</h3>";
 		return false;
 	}
 	$sel='select * from users where login="'.$name.'" and pass="'.md5($pass).'"';
 	connect();
 	$res=mysql_query($sel);
 	$row=mysql_fetch_array($res,MYSQL_NUM);
 	if ($row[1]==$name) {
 		//session_start();
 		$_SESSION['ruser']=$name;
 		return true;
 	}
 	else{
 		return false;
 	}
 }
 
 function getComments($hotelid){
 	$res=mysql_query('select *from Comments where hotelid='.$hotelid);
 	$i=1;
 	while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
 	
 		$resi=mysql_query('select avatar from users 
		where login="'.$row[3].'"');
		$img="images/foto.png";
 		if ($rowi=mysql_fetch_array($resi,MYSQL_NUM)){
			$img="images/comment_logo".$i.".jpg";
			$file=fopen($img, "w");
			fwrite($file,$rowi[0]);
			if (filesize($img)<1) $img="images/foto.png";
			fclose($file);
			mysql_free_result($resi);
			}
		
 		echo "<dt><div><img src=".$img." style='width:50px'></div>";
			
		echo "<div>".$row[3]."&nbsp;".$row[4]."</div></dt>";
 		echo "<dh><div>".$row[2]."</div></dh>";
 		$i++;
 	}
 	mysql_free_result($res);
 }