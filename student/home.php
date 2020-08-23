<?php
  include "connection.php";

    include "navbar.php";
    ?>
 
  

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  
 </head>
<style type="text/css">

 body.modal-open{
    padding-right: 0 !important;
  }

  .mobal{
    padding-right: 0  !important;
  }

  .carouselExampleIndicators {
  	
  }

  </style>



 <body>

   

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="text-align: center; height: 500px; width: 100%;background: url(../photos/bg1.jpg);
  background-repeat: no-repeat;
  background-size: 100% 100%;  ">
  
  <div class="carousel-inner" style="color: #66e0ff">
    <div class="container"  >
    <div class="carousel-item active">
     <h1 class="display-4" >Welcom To E-Library</h1>
  <p class="lead"> This is online website where you can find many books. </p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    </div>
    



    <div class="carousel-item">
      
  <div class="row" style="margin-top: 50px;">
  
    <?php 

 $query = "SELECT * FROM info ";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result)

?>
<div class="col-md-6 ">
  <h3> CONTACT US</h3>
  <hr style="border-top: 2px solid black" >
  <p style="font-size: 28px;" ><i class="fa fa-phone-square"> </i>: <a href="">&nbsp;<?php echo $row['contact']; ?></a></P>
    <P style="font-size: 28px;"> <i class="fa fa-envelope"></i><a href="">&nbsp;<?php echo $row['email']; ?></a></P>
    
  
</div>
  
  <div class="col-md-6" >
    <h3>FOLLOW US</h3>
    <hr style="border-top: 2px solid black">
  <a href="<?php echo $row['facebook'];?>"><i class="fa fa-facebook-square" style="font-size: 32px;"></i></a>&nbsp;
  <a><i class="fa fa-google" style="font-size: 32px;"></i></a>&nbsp;
  <a><i class="fa fa-instagram" style="font-size: 32px;"></i></a>&nbsp;
</div>


</div>
    </div>
  </div>
</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  






<!---------------------- main body -------------------------->

    <div class="container">
    <?php
      $count = 0;
      $row = select6LatestBook($db);
      ?>
    <br>
      <p class="lead text-center text-muted">Latest books</p>
      <div class="row">
        <?php foreach($row as $book) { ?>
        <div class="col-md-3">
          <?php
            if(isset($_SESSION['login_user']))
            {
              ?>
          <a href="detail.php?bookisbn=<?php echo $book['book_isbn']; ?>">

           <img class="img-responsive img-thumbnail" src="../photos/<?php echo $book['image']; ?>"  style="height: 300px; width: 200px;">
          
          </a>
          <?php
         }
            else
          {
        ?>
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"
                style="color: #D67B22;">
                  

                 <img class="img-responsive img-thumbnail" src="../photos/<?php echo $book['image']; ?>"  style="height: 300px; width: 200px;">
                </button>
         
          
        
         
         <?php
            }
        ?>


        </div>
        <?php } ?>
      </div>
    </div>
<!--- second row main body--->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">User Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form  name="login" action="" method="post">
       <input class="form-control" type="text" name="email" placeholder="Email" required="" autocomplete="off"> <br>
       <input class="form-control" type="password" name="password" placeholder="Password" required="" autocomplete="off"> <br>
       <input class="btn btn-primary" type="submit" name="submit1" value="Login" ><br> <br><br>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal2">Forgot password?</button><br>
        New to this website?
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal1">Sign Up</button><br><br>
    </form>
      </div>
        
        
      </div>
      
    </div>
  </div>




<!----user sign in ---->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">User Registration</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <form  name="Signin" action="" method="post">
       <input class="form-control" type="text" name="first" placeholder="First Name" required="" autocomplete="off"><br>
        <input class="form-control" type="text" name="last" placeholder="Last Name" required="" autocomplete="off"><br>
        <input class="form-control" type="text" name="username" placeholder="Username" required="" autocomplete="off"><br>
        <input class="form-control" type="password" name="password" placeholder="password" required="" autocomplete="off"><br>
        <input class="form-control" type="email" name="email" placeholder="Email" required="" autocomplete="off"><br>
        
        <input class="form-control" type="tel" name="contact"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone No" required="" autocomplete="off"><br>
       
        <input class="btn btn-primary" type="Submit" name="submit2" value="SignIn"><br> <br>
    </form>
      </div>
        
        
      </div>
      
    </div>
  </div>

<!------ feedback--->
 




        
  <!---- forget pw--- table--->   
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
       <form action="" method="post">
        <br>
        <br>
    <input type="text" name="username" class="form-control" placeholder="Username" required="" autocomplete="off"><br>
    <input type="text" name="email" class="form-control" placeholder="Email" required="" autocomplete="off"><br>
    <input type="text" name="password" class="form-control" placeholder="New Password" required="" autocomplete="off"><br>
    <br>
    <button class="btn btn-primary" type="submit" name="submit3">Update</button>
  </form>
    
      </div>
        
        
      </div>
      
    </div>
  </div> 
    
      
<!--- user login-->

<?php

    if(isset($_POST['submit1']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE email='$_POST[email]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              
              <script type="text/javascript">
                alert("The email and password doesn't match.");
              </script> 
              
            
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

<!-- user sign in --->
<?php

      if(isset($_POST['submit2']))
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




<!--- feedback--->

<!-- forget password-->
<?php
    if(isset($_POST['submit3']))
    {
      if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
      {
        ?>
          <script type="text/javascript">
                alert("The Password Updated Sucessfully.");
                  </script> 
                <?php

      }
    }


  ?>




</div>


<div class="col-md-12" style="margin-top: 100px;">

 

<?php
include"footer.php";
?>
</div>

</body>
</html>
<?php
function select6LatestBook($db){
    $row = array();
    $query = "SELECT book_isbn, image, name FROM books ORDER BY book_isbn DESC";
    $result = mysqli_query($db, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($db);
        exit;
    }
    for($i = 0; $i < 4; $i++){
      array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
  }
  ?>

<style>
  
  element {
    padding-right: 34px;
}
.modal-open {
    overflow: hidden;
}
html, body {
    font-family: Verdana,sans-serif;
    font-size: 15px;
    line-height: 1.5;
}
body {
    margin: 0;
}
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





/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  width: auto;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-2,input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

