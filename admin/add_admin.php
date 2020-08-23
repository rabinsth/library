<?php
  include "connection.php";
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: #F2F2F2;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}




.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}


.form-control
{
  background-color: white;
  color: black;
  height: 40px;
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
  font-size: 16px;
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
  font-size: 16px;
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


</head>
<body>
  <div class="col-md-12" style="margin-bottom: 80px;">
    <?php
     include "navbar.php"; ?>
  </div>
  <div class="container">

	   <form  action="add_admin.php" method="post" enctype="multipart/form-data" >

        <div class="row">
        <div class="col-25">
          <label for="first" style="margin-left: 50px;">First Name</label>
      </div>
       <div class="col-50">
       <input type="text" name="first" class="form-control" placeholder="First Name" required="" autocomplete="off"><br>
        </div>
      </div>
       

       <div class="row">
        <div class="col-25 ">
          <label for="last" style="margin-left: 50px;">Last Name</label>
      </div>
       <div class="col-50">
         <input type="text" name="last" class="form-control" placeholder="Last Name" required="" autocomplete="off"><br>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="username" style="margin-left: 50px;">Username</label>
      </div>
       <div class="col-50">
         <input type="text" name="username" class="form-control" placeholder="UserName" required="" autocomplete="off">
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="email" style="margin-left: 50px;">Email</label>
      </div>
       <div class="col-50">
         <input type="text" name="email" class="form-control" placeholder="Email" required="" autocomplete="off"><br>
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="cid" style="margin-left: 50px;">Password</label>
      </div>
       <div class="col-50">
         <input type="Password" name="password" class="form-control" placeholder="Password" required="" autocomplete="off"><br>
      </div>
    </div>
        
        <div class="row">
        <div class="col-25">
          <label for="contact" style="margin-left: 50px;">Contact</label>
      </div>
       <div class="col-50">
         <input type="text" name="contact" class="form-control" placeholder="contact" required="" autocomplete="off"><br>
      </div>
</div>


      <div class="row">
        <div class="col-25">
          <label for="image" style="margin-left: 50px;">Profile Image</label>
      </div>
       <div class="col-50">
        <input  class="form-control" type="file" name="image" required=""><br>
        </div>
      </div>

      <div class="row" >
        <input type="submit" value="Add" name="Submit" class="btn btn-submit">
        <input type="reset" value="Cancel" class="btn btn-reset" >
      </div> 
        
    </form><br><br>
  </div>
  

<?php
     if(isset($_POST['Submit']))
    {

       $first=$_POST['first'];
      $username=$_POST['username'];
      $last=$_POST['last'];
      $email=$_POST['email'];
      $password =$_POST['password'];
       $contact =$_POST['contact'];
      
      $target_path = "../admin_photos/";

      $target_path = $target_path . basename($_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
   

     

        $sql= "INSERT INTO admin(`first`,`last`,`username`,`email`,`password`,`contact`,`pic`) VALUES ( '$last','$last','$username','$email','$password', '$contact','$target_path')";
        if($db->query($sql) === TRUE){
          echo "<br><br>";
          echo "<script type='text/javascript'>
           alert('Registration successful');
          </script>";

        }
        else
        {
          echo "Error: " . $sql . "<br>" . $db->error;
          echo"<script type='text/javascript'>
           alert('Registration successful');
          </script>";
        }
        $db->close();
     
    }
  
?>

<div class="col-md-12" style="margin-top: 50px;">
<?php
    include"footer.php";
?>
</div>
</body>
</html>





