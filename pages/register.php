<div class="container">
	<?php 
	if (isset($_REQUEST['adduser'])) {
		$login=trim($_REQUEST['login']);
		$pass=trim($_REQUEST['pass']);
		if ($login==""|| $pass=="") {
			echo "Не заполнены поля";
			exit();
		}
		if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
			move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/'.$_FILES['avatar']['name']);
			$path='images/'.$_FILES['avatar']['name'];
		}
		$customer=new Customer($login,$pass,$path);
		$customer->IntoDb();
	
	}
	else{
	?>
	<form action="index.php?page=4" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="login">Login</label>
			<input type="text" name="login" class="form-control">
		</div>
		<div class="form-group">
			<label for="pass1">Password</label>
			<input type="password" name="pass" class="form-control">
		</div>
		<div class="form-group">
			<label for="pass2">Confirm password</label>
			<input type="password" name="pass2" class="form-control">
		</div>
		<!-- <div class="form-group">
			<label for="email">Email adres</label>
			<input type="email" name="email" class="form-control">
		</div> -->
		<div class="form-group">
			<label for="file">Foto</label>
			<input type="file" name="avatar" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary" name="adduser">Register</button>
	</form>
	<br>
	<?php 
	}
	?>
</div>