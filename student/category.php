<?php
    include"connection.php";
    include "navbar.php";
    
    // get pubid
    if(isset($_GET['sid']))
    {
        $sid = $_GET['sid'];
    } 
    else
     {
        echo "Wrong query! Check again!";
        exit;
    }

    // connect database
   
    $ScatName = getScatName($db, $sid);
   
    $query = "SELECT book_isbn, name,  image FROM books WHERE sid = '$sid'";
    $result = mysqli_query($db, $query);
    if(!$result)
    {
        echo "Can't retrieve data " . mysqli_error($db);
        exit;
    }
    if(mysqli_num_rows($result) == 0)
    {
        echo "Empty books ! Please wait until new books coming!";
        exit;
    }

    
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>


   <style type="text/css">
    * {
  box-sizing: border-box;
}

body{
  margin: 0px;
  padding: 0px;
  background-color: #F2F2F2;
}
.modal {
    padding-right: 0px !important;
}

.modal fade {
  padding-right: 0px !important:;
}
    
.column {
  float: left;
  width: 20%;
  padding-left: 20px;
  padding-bottom: 30px;

  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the four columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
    
</style>

</head>
<body>



<div class="container">
   <p class="lead" style="text-align: center; font-size: 24px; margin-top: 80px;">  <?php echo $ScatName; ?></p><br>
    <div class="row">
    <?php 
    while($row = mysqli_fetch_assoc($result))
    {
?>
     
        <div class="col text-center " style="margin:5px; border-radius: 10px; background-color: white;">
          <a href="detail.php?bookisbn=<?php echo $row['book_isbn'];?>">
            <img class="img-responsive " src="../photos/<?php echo $row['image'];?>"  style="margin-top: 25px; height: 250px; width: 180px;">  
       <hr>
            <p style="text-align: center;"> <?php echo $row['name'];?></p>

          </a>
           

        </div>
   


    <?php
    }
    ?>
     </div>



</div>

<hr>

<!--- footer--->

<div class="col-md-12" style="margin-top: 50px;">
     <?php
include "footer.php";
 ?>
</div>
</body>
</html>

 
<?php

function getScatName($db, $sid){
        $query = "SELECT scname FROM sub_category WHERE sid = '$sid'";
        $result = mysqli_query($db, $query);
        if(!$result){
            echo "Can't retrieve data " . mysqli_error($db);
            exit;
        }
        if(mysqli_num_rows($result) == 0){
            echo "Empty books ! Something wrong! check again";
            exit;
        }

        $row = mysqli_fetch_assoc($result);
        return $row['scname'];
    }
    ?>


    