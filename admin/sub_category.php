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
        
        <div class="list-group" id="list-tab" role="tablist" style="float: left; margin-left: 10px; margin-top: 80px;">
        
      <a href="category.php?sid=<?php echo $row['sid']; ?>" class="btn btn-outline-primary" role="button"><?php echo $row['scname']; ?></a>
      
    </div>
 <?php 

        } 


    ?>
   


   