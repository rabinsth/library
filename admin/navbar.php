
<?php
session_start();
include 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	
</head>
<?php 
 $query = "SELECT * FROM info ";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result)

?>

<body style="margin: 0px;">
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <img class="" src="../photos/<?php echo $row['logo']; ?>" style="height: 40px; width: 40px;" >
  <a class="navbar-brand" href="books.php" style="font-size: 24px;">
  

&nbsp;<?php echo $row['name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      



          <?php
            if(isset($_SESSION['login_user']))
            {
              ?>
              
                 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
         <i class="fa fa-book"></i>&nbsp;BOOKS

   
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
         <?php


      $query = "SELECT * FROM category ORDER BY cid";
      $result = mysqli_query($db, $query);
      if(!$result)
      {
        echo "Can't retrieve data " . mysqli_error($db);
        exit;
      }
      if(mysqli_num_rows($result) == 0){
        echo "Empty category ! Something wrong! check again";
        exit;
      }

    ?>
  
  
    <?php 
      while($row = mysqli_fetch_assoc($result))
      {
        $count = 0; 
        $query = "SELECT cid FROM books";
        $result2 = mysqli_query($db, $query);
        if(!$result2){
          echo "Can't retrieve data " . mysqli_error($db);
          exit;
      }
      while ($CatInBook = mysqli_fetch_assoc($result2))
      {
        if($CatInBook['cid'] == $row['cid']){
          $count++;
        }
      }
    ?>

    
 <a  class="dropdown-item" href="sub_category.php?cid=<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></a>
    


  <?php 

    } 

  ?>

      <a class="dropdown-item" href="books.php">All Books</a>
  
    
    </div>
        </li>


        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-info-circle"></i>&nbsp;INFORMATION
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="student.php">User-Info</a>
          <a class="dropdown-item" href="all_books.php">Book-Info</a>
          <a class="dropdown-item" href="feedback.php">Feedback</a>
        </div>
      </li>



    </ul>
        
<ul class="nav navbar-nav navbar-right">
        
          <li class="nav-item " >
            <a class="nav-link" href="profile.php" >
            <div style="color: white; " >

              <?php
                echo "<img class='rounded-circle' height=25 width=25 src='../admin_photos/".$_SESSION['pic']."'>";
                echo " ".$_SESSION['login_user'];
              ?>
            </div>
          </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php ">
           <i class="fa fa-sign-out"></i>LOGOUT
            </a>
          </li>
           
            <?php
            }
            
          ?>

        </ul>
      
  </div>
</nav>
</body>
</html>
