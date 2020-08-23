
<?php
	include "navbar.php";
  include"connection.php";
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		
		 body{
    background-color: white;
  }

* {
  box-sizing: border-box;
}

input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #2B679A;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  height: 35px;
  width: 90px;
  text-align: center;
}


input[type=reset] {
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
}



.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;

}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;

}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}



/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75 {
    width: 100%;
    margin-top: 0;
  }
}
</style>

	</style>
</head>
<body style="background-color: white;">

	<h2 style="text-align: center;color: black; margin-top: 60px;">Edit Website Information</h2>
	<?php
		
		$sql = "SELECT * FROM `info` ";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$logo=$row['logo'];
			$name=$row['name'];
			$email=$row['email'];
			$contact=$row['contact'];
       
			
		
		}

	?>

	<br>
	
	<div class=container>
		<form action="" method="post" enctype="multipart/form-data">

	 <div class="row">
      <div class="col-25">
        <label for="image">LOGO</label>
      </div>
      <div class="col-75">
      <input class="form-control" type="file" name="file">
      </div>
    </div>

		<div class="row">
      <div class="col-25">
        <label for="first">Name</label>
      </div>
      <div class="col-75">
     <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
	</div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="last">Email</label>
      </div>
      <div class="col-75">
    <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
	</div>
    </div>

	
	<div class="row">
      <div class="col-25">
        <label for="username">Contact No</label>
      </div>
      <div class="col-75">
   <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

	</div>
    </div>

<!--
  <div class="row">
      <div class="col-25">
        <label for="username">Slide1heading</label>
      </div>
      <div class="col-75">
   <input class="form-control" type="text" name="slide1heading" value="<?php echo $slide1heading; ?>">

  </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="username">Slide2heading</label>
      </div>
      <div class="col-75">
   <input class="form-control" type="text" name="slide2heading" value="<?php echo $slide2heading; ?>">

  </div>
    </div>


<div class="row">
      <div class="col-25">
        <label for="username">Slide1body</label>
      </div>
      <div class="col-75">
   <input class="form-control" type="text" name="slide1body" value="<?php echo $slide1body; ?>">

  </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="username">Slide2body</label>
      </div>
      <div class="col-75">
   <input class="form-control" type="text" name="slide2body" value="<?php echo $slide2body; ?>">

  </div>
    </div>
    
-->

   

	<div class="row">
      <input type="submit" value="Save" name="submit" class="btn btn-submit">

      <input type="reset" value="Cancel" class="btn btn-reset" >
    </div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"../photos/".$_FILES['file']['name']);

			$name=$_POST['name'];
			$email=$_POST['email'];
			
			$contact=$_POST['contact'];
			$logo=$_FILES['file']['name'];
      
     

			$sql1= "UPDATE info SET logo='$logo', name='$name', email='$email', contact='$contact'";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="books.php";
					</script>
				<?php
			}
		}
 	?>



</body>
</html>