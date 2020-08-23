<?php
	include "connection.php";
	include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	


    <style type="text/css">
 		body{
 			background-color: #d8d4d2;
 		}


 	</style>


</head>
<body>
 	<div class="container" style="margin-top: 100px; ">
 		
 		
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="profile_edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM `student` where username='$_SESSION[login_user]' ;");
 			?>
 			<?php
 				$row=mysqli_fetch_assoc($q);?>
 		<div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="../student_photos/<?php echo $_SESSION['pic']; ?>" style= "height: 300px; width: 250px;">
        </div>
    

 			

 			<div class="col-md-6 text-center">	
 			<div style="text-align: center;"> <b>Welcome,<?php echo $_SESSION['login_user']; ?> </b>
	 			
 			</div>
 			<br>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-hover'>";
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

 		</div>
 		<div class="col text-center">

 			<form action="" method="post">
 			<button class="btn btn-primary" style="float: left; width: 70px;margin-left:  60px; margin-right:  30px;" name="submit1">Edit</button>  
 			<button class="btn btn-danger" style="float: left; width: 70px;" name="submit2">Delete</button>
 		</form>
 	</div>
 		
 		</div>
 	</div>
 	

</body>
</html>



<?php

 				if(isset($_POST['submit2']))
 				{
 					
 					$query = "DELETE FROM student WHERE  username='$_SESSION[login_user]' ";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "<script type='text/javascript'>alert('Delated Sucessfully!')</script>";
		exit;
		}
		unset($_SESSION['login_user']);
		
	
	header("Location: home.php");
}
?>

