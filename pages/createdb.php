<?
include_once('classes.php');
Tools::SetParam('localhost','root','123456','shop');
$pdo=Tools::connect();
//роли пользователей
$role='create table Roles(id int not null auto_increment primary key,
	role varchar(32)not null unique)default charset="utf8"';
//создаем первую таблицу пользователи
$customer='create table Customers(id int not null auto_increment primary key,
	login varchar(32)not null unique,
	pass varchar(128)not null,
	roleid int,
	foreign key(roleid) references Roles(id) on update cascade,
	discount int,
	total int,
	imagepath varchar(255))default charset="utf8"';

//категории
$cat='create table Categories(id int not null auto_increment primary key,
	category varchar(64)not null unique)
	default charset="utf8"';
//подкатегории
$sub='create table SubCategories(id int not null auto_increment primary key,
	sucategory varchar(64)not null unique,
	catid int,
	foreign key(catid) references Categories(id) on update cascade)
	default charset="utf8"';
//товары
$item='create table Items(id int not null auto_increment primary key,
	itemname varchar(128)not null,
	catid int,
	foreign key(catid) references Categories(id) on update cascade,
	subid int,
	foreign key(subid) references SubCategories(id) on update cascade,
	pricein int not null,
	pricesale int not null,
	info varchar(256) not null,
	rate double,
	imagepath varchar(256) not null,
	action int)
	default charset="utf8"';//связь
//корзина
$cart='create table Carts(id int not null auto_increment primary key,
	customerid int,foreign key(customerid) references Customers(id) on delete cascade,
	itemid int,foreign key(itemid) references Items(id) on delete cascade,
	datain date,
	price int)default charset="utf8"';
//заказ
$order='create table Orders(id int not null auto_increment primary key,
	customerid int,foreign key(customerid) references Customers(id) on delete cascade,
	itemid int,foreign key(itemid) references Items(id) on delete cascade,
	datain date,
	ordername int not null,
	price int)default charset="utf8"';
//фото
$images='create table Images(id int not null auto_increment primary key,
	itemid int,foreign key(itemid) references Items(id) on delete cascade,
	imagepath varchar(255))default charset="utf8"';

$sale='create table Sales(id int not null auto_increment primary key,
	customername varchar(32),
	itemname varchar(128),
	pricein int,
	pricesale int,
	datesale date)default charset="utf8"';

//выполняем создание бд
$pdo->query($role);
$pdo->query($customer);
$pdo->query($cat);
$pdo->query($sub);
$pdo->query($item);
$pdo->query($cart);
$pdo->query($order);
$pdo->query($images);
$pdo->query($sale);
