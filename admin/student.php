<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<style type="text/css">
		.srch
		{
			
		}
	</style>
</head>
<body>
	<!--__________________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form navbar-right" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Student username.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	
	<div class="container">
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,email,contact,pic FROM `student` where username like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No user found with that username. Try searching again.";
			}
			else
			{
				?>
				<div class="table-responsive"> 
				<table class="table table-striped" style="margin-top:  30px;">
				<tr style="background-color: #7BBDC0;">
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Contact</th>
			<th>Image</th>

			
			
		</tr>
		<?php while($row=mysqli_fetch_assoc($q))
		{
		 ?>
		<tr>
			<td><?php echo $row['first']; ?></td>
			<td><?php echo $row['last']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td>
				<img class="img-responsive img-thumbnail" src="../student/images/<?php echo $row['pic']; ?>" style="height: 90px; width: 90px;" >
			</td>
			
			
		</tr>

	
		<?php } ?>
	</table>
</div>
		<?php
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT first,last,username,email,contact,pic FROM student; ");
?>
		<div class="table-responsive"> 
				<table class="table table-striped" style="margin-top:  30px;">
				<tr style="background-color: #7BBDC0;">
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Contact</th>
			<th>Image</th>
			
			
		</tr>
		<?php while($row=mysqli_fetch_assoc($res))
		{ 
			?>
		<tr>
			<td><?php echo $row['first']; ?></td>
			<td><?php echo $row['last']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td>
				<img class="img-responsive img-thumbnail" src="../student/images/<?php echo $row['pic']; ?>" style="height: 90px; width: 90px;" >
			</td>
			
		</tr>
		<?php 
			}
		?>
	</table>
	<?php
		}


	?>
</div>
</div>



<div class="col-md-12">
	<?php
	include"footer.php";?>
</div>
   
</body>
</html>