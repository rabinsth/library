<?php 

include"connection.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="col-md-12" style="margin-top: 50px;">
		<?php 
		include"navbar.php";
		?>
	</div>
<div class="container">
	
	<?php
	$res= mysqli_query($db,"SELECT username, message FROM feedback;");
	?>

	<div class="table-responsive">
		
		<table class ="table table-striped" style="margin-top: 30px;">
			<tr style="background-color: #7BBDC0;">
				<th>Username</th>
				<th>Message</th>
				<th>Action</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($res)) {
				?>
			<tr>
				<td><?php echo $row['username'];?></td>

				<td><?php echo $row['message'];?></td>

				<td>
					<a href="delete.php?username=<?php echo $row['username']; ?>"><button class ="btn btn-danger">Delete</button></a>
				</td> 
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>
</body>
</html>



