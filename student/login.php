<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  
  
 </head>
 <body>



<div class="container">
   
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="background-color:#d1d0ea;">
        <h1 style="text-align: center;font-size: 25px; font-weight: bold;">User Login</h3>
        <br><br>
        <form  name="login" action="" method="post">

       
        
        
          <input class="form-control" type="email" name="email" placeholder="Email" required="" autocomplete="off"> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required="" autocomplete="off"> <br>
           <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: #FFFFFF; background-color: blue; width: 70px; height: 35px"><br> <br>
          <a style="color: blue; text-decoration: none;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp<br><br>
        New to this website?<a style="color: blue; text-decoration:none; " href="registration.php">Sign Up</a><br><br>
         </form>

        </div>
      
    </div>
      </div>
     
      
   
        
  




<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE email='$_POST[email]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              -->
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The email and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic']= $row['pic'];

        ?>
          <script type="text/javascript">
            window.location="books.php"
          </script>
        <?php
      }
    }

  ?>

</body>
</html>




<style>
  *{
    margin: 0px;
    padding: 0px;
  }

  .row{
            margin: 0px;
            padding: 0px;

        }
* {
  box-sizing: border-box;
}

input[type=text]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color:#efd8a5;
  
  padding-top: 20px;
  margin : 0px;
  width: auto;
  height: 550px;

}




/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  width: auto;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25,input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>