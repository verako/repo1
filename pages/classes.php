<?php 
//
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
//пользователи
class Customer{
	protected $id;
	protected $login;
	protected $pass;
	protected $roleid;
	protected $discount;
	protected $total;
	protected $imagepath;

	function __construct($login,$pass,$imagepath,$id=0){
		if ($imagepath=="") {
			$imagepath='images/foto.png';
		}
		$this->login=$login;
		$this->pass=$pass;
		$this->imagepath=$imagepath;
		$this->id=$id;
		$this->discount=0;
		$this->total=0;
		$this->roleid=2;
	}
	function IntoDb(){
		Tools::SetParam('localhost','root','123456','shop');
		$pdo=Tools::connect();
		$ps=$pdo->prepare('insert into customers (login,pass,roleid,discount,total,imagepath) value(:login,:pass,:roleid,:discount,:total,:imagepath)');
		$data=array('login'=>$this->login,'pass'=>$this->pass,'roleid'=>$this->roleid,'discount'=>$this->discount,'total'=>$this->total,'imagepath'=>$this->imagepath);

		$ps->execute($data);

	}
	static function FromDb($id){
		Tools::SetParam('localhost','root','123456','shop');
		$pdo=Tools::connect();
		$ps=$pdo->prepare('select * from customers where id=?');
		$ps->execute(array($id));
		$row=$ps->fetch(PDO::FETCH_LAZY);//массив создается после обращения к данным
		$customer=new Customer($row['login'],$row['pass'],$row['imagepath'],$id);
		return $customer;
	}
}
//товары
class Item{
	protected $id,$itemname,$catid,$subid,$pricein,$pricesale,$info,$rate,$imagepath,$action;
	function __construct(array $data){
		$this->id=$data['id'];
		$this->itemname=$data['itemname'];
		$this->catid=$data['catid'];
		$this->subid=$data['subid'];
		$this->pricein=$data['pricein'];
		$this->pricesale=$data['pricesale'];
		$this->info=$data['info'];
		$this->rate=0;
		$this->imagepath=$data['imagepath'];
		$this->action=0;

	}
	function IntoDb(){
		Tools::SetParam('localhost','root','123456','shop');
		$pdo=Tools::connect();
		$ps=$pdo->prepare('insert into items (itemname,catid,subid,pricein,pricesale,info,rate,imagepath,action) value(:itemname,:catid,:subid,:pricein,:pricesale,:info,:rate,:imagepath,:action)');
		$data=array('itemname'=>$this->itemname,
			'catid'=>$this->catid,
			'subid'=>$this->subid,
			'pricein'=>$this->pricein,
			'pricesale'=>$this->pricesale,
			'info'=>$this->info,
			'rate'=>$this->rate,
			'imagepath'=>$this->imagepath,
			'action'=>$this->action);

		$ps->execute($data);

	}
}