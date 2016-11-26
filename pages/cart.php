<?php 

$data=array('itemname'=>'Телефон',
			'catid'=>'1',
			'subid'=>'2',
			'pricein'=>'2000',
			'pricesale'=>'3000',
			'info'=>'jgujghoi',
			'rate'=>'5',
			'imagepath'=>'images/tovar.jpg',
			'action'=>'');
$i=new Item($data);
$i->IntoDb();