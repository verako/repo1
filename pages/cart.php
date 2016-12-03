<div class="row">
<?php 
foreach ($_COOKIE as $key => $value) {
	if (substr($key,0,4)=='cart') {
		$iid=substr($key, 4);
		$item=Item::fromDb($iid);
		$item->Draw();

	}
}
?>
</div>