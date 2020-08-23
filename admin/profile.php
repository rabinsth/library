<?php
	include "connection.php";
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	


    <style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: black;
 		}
 	button[name=submit1] {
  background-color: #2B679A;
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  height: 35px;
  width: 90px;
  text-align: center;
}


button[name=submit2] {
  background-color:#fc0a0a;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  height:35px;
  width: 90px;
  margin-left: 10px;
  text-align: center;
  font-size: 16px;
}
 	</style>


</head>
<body style="background-color:#F2F2F2; ">

	<div class="col-md-12" style="margin-bottom: 80px;">
		

		<?php
		include "navbar.php";
		?>
	</div>
 	<div class="container">
 		<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 		
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM `admin` where username='$_SESSION[login_user]' ;");
 			?>
 			
 			<div class="row">
 				<div class="col-md-3 text-center">
 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=300 width=250 src='../admin_photos/".$_SESSION['pic']."'>
 				</div>";
 			?>
 			
 		</div>
 	


 		<div class="col-md-6"> 
 			
 			<div class="table-responsive ">
 			<?php
 				echo "<b>";
 				echo "<table class='table table-striped' style='margin-top:  30px; '>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['first'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['last'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['contact'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 			<form action="" method="post">
 			<button class="btn btn-default" name="submit1">Edit</button>  
 			<!--<button class="btn btn-default" name="submit2">Delete</button>-->
 		</form>
</div>
</div>


</div>
 		
 		 
 		</div>
 	

<!--- footer--->

 <div class="col-md-12" style="margin-top: 50px;">

      <?php
      	include"footer.php";
      ?>

</div>


</body>
</html>