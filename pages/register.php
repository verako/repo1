<div class="container">
	<?php 
	if (isset($_POST['adduser'])) {
		if (register($_POST['login'],$_POST['pass'],$_POST['email'],$_FILES['avatar']['tmp_name'])) {
			echo "<h3 style='color:green;'>OK</h3>";
		}
	
	}
	else{
	?>
	<form action="index.php?page=3" method="post" enctype="multipart/form-data">
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
		<div class="form-group">
			<label for="email">Email adres</label>
			<input type="email" name="email" class="form-control">
		</div>
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