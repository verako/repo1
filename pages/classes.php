<?php 
class Tools{
	static private $param;
	static function SetParam($host,$user,$pass,$dbname){
		Tools::$param=array($host,$user,$pass,$dbname);
		// Tools::$param[]=$host;
		// Tools::$param[]=$user;
		// Tools::$param[]=$pass;
		// Tools::$param[]=$dbname;
	}

//подключение к бд MySQL строка подключения
static function connect(){
	$dsn='mysql:host='.Tools::$param[0].';dbname='.Tools::$param[3].';charset=utf8;';
	//массив параметров для PDO используем ассоциативный массив
	$options=array(
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//сигнализировать о возникновении ошибки сразу
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8'
		);
	//непосредственно подключение
	$pdo=new PDO($dsn, Tools::$param[1],Tools::$param[2],$options);
	return $pdo;
}
}