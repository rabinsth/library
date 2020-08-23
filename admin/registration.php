<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

	<style type="text/css">
		section{
			margin-top: -20px;
		}
	</style>

<body>

	<section >
		<div class="reg_img" >
			
			<div class="box2">
			<h3 style="text-align: center;font-size: 30px;font-family: Lucida Console; font-weight: bold; line-height: 30px;">Library Management System</h3>
			<h1 style="text-align: center;font-size: 25px; font-weight: bold;">User Registration Form</h3>
			<form name="Registration" action="" method="post">
				<br>
				<div class="login">
				<input class="form-control" type="text" name="first" placeholder="First Name" required="" autocomplete="off"><br>
        <input class="form-control" type="text" name="last" placeholder="Last Name" required="" autocomplete="off"><br>
        <input class="form-control" type="text" name="username" placeholder="Username" required="" autocomplete="off"><br>
        <input class="form-control" type="password" name="password" placeholder="password" required="" autocomplete="off"><br>
        <input class="form-control" type="email" name="email" placeholder="Email" required="" autocomplete="off"><br>
        
        <input class="form-control" type="tel" name="contact"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone No" required="" autocomplete="off"><br>>
				<input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px;">
			</form>
			</div>
		</div>
		
	</section>

	

	<?php

		if (isset($_POST['submit']))
		{
			$count=0;
			$sql="SELECT username from `admin`";
			$res=mysqli_query($db,$sql);

			while($row=mysqli_fetch_assoc($res))
			{
				if($row['username']== $_POST['username'])
				{
					$count=$count+1;
				}
			}
			if($count==0)
			{

				mysqli_query($db,"INSERT INTO `admin` VALUES('', '$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]','profile.jpg');");
	?>
		<script type="text/javascript">
			alert("Registration sucessful");
		</script>
	<?php
		}

		else
		{
	?>
				<script type="text/javascript">
				alert("The username already exists.");
				</script>
	<?php

		}

		}
	?>


     



</body>
</html>