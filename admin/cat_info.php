<?php
include"navbar.php";
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

	

	<h2 style="text-align: center;">Categories</h2>
	<div class="container">
	<?php

		
			$res=mysqli_query($db,"SELECT cid,cname FROM category; ");
?>
		<div class="table-responsive"> 
				<table class="table table-striped " style="margin-top:  30px; width: 50%; margin-left: 22%">
				<tr style="background-color: #7BBDC0;">
			<th>CID</th>
			<th style="text-align: center;">Category Name</th>
			

			
			
			
		</tr>
		<?php while($row=mysqli_fetch_assoc($res))
		{ 
			?>
		<tr>
			<td><?php echo $row['cid']; ?></td>
			<td style="text-align: center;"><?php echo $row['cname']; ?></td>
			
		</tr>
		<?php
		}


	?>

		
	</table>
	</div>
</div>
</body>
</html>