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
   <form  name="login" action="" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="background-color:#d1d0ea;">
        <h1 style="text-align: center;font-size: 25px; font-weight: bold;">User Registration </h3>
        <br>
        
        <input class="form-control" type="text" name="first" placeholder="First Name" required="" autocomplete="off"><br>
        <input class="form-control" type="text" name="last" placeholder="Last Name" required="" autocomplete="off"><br>
        <input class="form-control" type="text" name="username" placeholder="Username" required="" autocomplete="off"><br>
        <input class="form-control" type="password" name="password" placeholder="password" required="" autocomplete="off"><br>
        <input class="form-control" type="email" name="email" placeholder="Email" required="" autocomplete="off"><br>
        <input class="form-control" type="tel" name="contact" placeholder="Phone No" required="" autocomplete="off"><br>
       
        <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: #FFFFFF; background-color: blue; width: 70px; height: 35px"><br> <br>

        </div>
      
    </div>
      
     
      
    </form>
        
  
</div>


<?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]',  '$_POST[email]', '$_POST[contact]', 'p.jpg');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>




<style>
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
  text-align: center;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color:#efd8a5;
  padding: 20px;
  width: auto;
  height: 580px;
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