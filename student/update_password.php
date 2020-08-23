<?php
	include"navbar.php";
	include"connection.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="text/css">
		body{
			
			height:650px;
			background-color: red;
			background-image: url("images/");
			background-repeat: no-repeat;
		}

		.wrapper
		{
			width:400px;
			height: 400px;
			margin: 100px auto;
			background-color: black;
			opacity: .6;
			color: white;
			padding: 27px 15px;
		}

		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div>
		<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>

		</div>
	<div style="padding-left: 31px;">
	<form action="" method="post">
		<input type="text" name="username" class="form-control" placeholder="Username" required="" autocomplete="off"><br>
		<input type="text" name="email" class="form-control" placeholder="Email" required="" autocomplete="off"><br>
		<input type="text" name="password" class="form-control" placeholder="New Password" required="" autocomplete="off"><br>
		<button class="btn btn-default" type="submit" name="submit">Update</button>
	</form>
	</div>
	</div>

	<?php
		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Sucessfully.");
              		</script> 
              	<?php

			}
		}


	?>

</body>
</html>