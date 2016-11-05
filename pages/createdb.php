<?
include_once('functions.php');
connect();
//создаем первую таблицу страны
$ct1='create table Countries(id int not null auto_increment primary key,
	country varchar(64))default charset="utf8"';

//города
$ct2='create table Cities(id int not null auto_increment primary key,
	city varchar(64),
	countryid int,
	foreign key(countryid) references Countries(id) on delete cascade)
	default charset="utf8"';
//отели
$ct3='create table Hotels(id int not null auto_increment primary key,
	hotel varchar(64),
	countryid int,
	foreign key(countryid) references Countries(id) on delete cascade,
	cityid int,
	foreign key(cityid) references Cities(id) on delete cascade,
	stars int,
	cost int,
	info varchar(1024))default charset="utf8"';
//картинки
$ct4='create table Images(id int not null auto_increment primary key,
	imagepath varchar(255),
	hotelid int,
	foreign key(hotelid) references Hotels(id) on delete cascade)
	default charset="utf8"';//связь
//роли пользователей
$ct5='create table Roles(id int not null auto_increment primary key,
	role varchar(32))default charset="utf8"';

$ct6='create table Users(id int not null auto_increment primary key,
	login varchar(32),
	pass varchar(32),
	email varchar(128),
	discount int,
	roleid int,
	foreign key(roleid) references Roles(id) on delete cascade,
	avatar mediumblob,
	phone varchar(32))
	default charset="utf8"';//связь
//выполняем создание бд
mysql_query($ct1);
mysql_query($ct2);
mysql_query($ct3);
mysql_query($ct4);
mysql_query($ct5);
mysql_query($ct6);//запрос соединения с $CTn
$err=mysql_errno();//номер ошибки
if ($err) {
	echo "Error code:".$err.'<br>';
	exit();//выход после ошибки
}