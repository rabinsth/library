<?php
session_start();
include "connection.php";

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
  

  
</head>


<body style="padding-right: 0px; margin: 0px; " >

<?php 
 $query = "SELECT * FROM info ";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result)

?>

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <img class="" src="../photos/<?php echo $row['logo']; ?>" style="height: 40px; width: 40px;" >
  <a class="navbar-brand" href="home.php"><?php echo $row['name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    
       <?php
            if(isset($_SESSION['login_user']))
            {

          ?>
                
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php">
                    <div style="color: white">
                      <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal" style="color: #F2F2F2;"><i class="fa fa-sign-in"></i>&nbsp;LOGIN</button>
        </li>
                
        
              </ul>
                <?php
            }
          ?>
    
  </div>
</nav>

  

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>Admin Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
       <form action="" method="post">
        <br>
        <br>
    <input class="form-control" type="text" name="username" placeholder="Username" required="" autocomplete="off"> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required="" autocomplete="off"> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: #FFFFFF; background-color: blue; width: 70px; height: 30px"><br> <br>
  </form>
    
      </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
    


    <!---- body---->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="text-align: center; height: 400px; width: 100%; background-color: #cff5f7; margin-top: 50px;">
  
  <div class="carousel-inner" >
    <div class="container"  >
    <div class="carousel-item active">
     <h1 class="display-4">Welcom To E-Library</h1>
  <p class="lead"> This is online website where you can find many books. </p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    </div>
    <div class="carousel-item">
     <h1 class="display-4">Our Team Menbers</h1>
  <p class="lead">This is a the admin site of E-Library. Admin can login through this page and make changes to the website</p>
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
  
  <div class="col-md-6">
    <h3>FOLLOW US</h3>
    <hr style="border-top: 2px solid black">
  <i class="fa fa-facebook-square" style="font-size: 32px;"></i>&nbsp;
  <i class="fa fa-google" style="font-size: 32px;"></i>&nbsp;
  <i class="fa fa-instagram" style="font-size: 32px;"></i>&nbsp;
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
  
<!----  footer--->

<?php
include"footer.php";
?>






</body>
</html>

<style type="text/css">
  element {
    padding: 0px 0px 0px 0px;
}
</style>
<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");

      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
             
          
            echo "<script type='text/javascript'>alert('Username Or Password doesnt match!')</script>";
              
        <?php
      }
      else
      {
        /*-------------if username & password matches---------*/
        $_SESSION['login_user'] = $_POST['username']; 
        $_SESSION['pic'] = $row['pic']; 

        ?>
          <script type="text/javascript">
            window.location="books.php"
          </script>
        <?php
      }
    }

  ?>
