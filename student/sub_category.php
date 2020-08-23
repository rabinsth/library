<?php
    include"connection.php";
    include "navbar.php";
    
    // get pubid
    if(isset($_GET['cid']))
    {
        $cid = $_GET['cid'];
    } 
    else
     {
        echo "Wrong query! Check again!";
        exit;
    }

    // connect database




            $query = "SELECT * FROM sub_category WHERE cid = '$cid'";
            $result = mysqli_query($db, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($db);
                exit;
            }
            if(mysqli_num_rows($result) == 0){
                echo "Empty sub_category ! Something wrong! check again";
                exit;
            }

        ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>



        
    <div class="col-md-6" style="margin-top: 80px;">
    
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $count = 0; 
                $query = "SELECT cid FROM sub_category ";
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

       
    


  

    <div class="list-group" id="list-tab" role="tablist" style="float: left; margin-left: 10px;">
        
      <a href="category.php?sid=<?php echo $row['sid']; ?>" class="btn btn-outline-primary" role="button" style="color:  #D67B22;"><?php echo $row['scname']; ?></a>
      
    </div>
  
  
        
 <?php 

        } 


    ?>
</div>

<br>
<br>
<hr style="border: 1px solid grey;">

<!-- _________________________________________________________ book display ____________________________________________________________ -->

<?php
 if(isset($_GET['cid']))
    {
        $sid = $_GET['cid'];
    } 
    else
     {
        echo "Wrong query! Check again!";
        exit;
    }

    // connect database
   
    $CName = getCName($db, $cid);
   
    $query = "SELECT book_isbn, name,  image FROM books WHERE cid = '$cid'";
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






<div class="container">
   <p class="lead" style="text-align: center; font-size: 24px; margin-top: 10px;">  <?php echo $CName; ?></p><br>
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

<?php

function getCName($db, $cid){
        $query = "SELECT cname FROM category WHERE cid = '$cid'";
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
        return $row['cname'];
    }
    ?>


<div class="col-md-12" style="margin-top: 50px;">

      <?php
        include"footer.php";
      ?>

</div>

</body>
</html>


<style type="text/css">
    body{
        background-color: #F2F2F2;

    }
</style>
