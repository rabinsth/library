
      <!-- Example row of columns -->
<style type="text/css">
  body{
   margin: 0px;
   padding: 0px;
   }
  }
</style>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="col-md-12" style="margin-bottom: 65px;">
<?php
  
  include "navbar.php";
  
 
?>
</div>
      <?php
      $book_isbn = $_GET['bookisbn'];
  // connecto database
  $query = "SELECT `name`,`description`,`book_isbn`,`authors`,`edition`,`publisher`,`image` FROM books WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($db, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($db);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $name = $row['name'];
      ?>



      <!---- body part ---->


      <p class="lead" style="margin-left: 62px ; color:blue; font-size: 24px;"><a href="books.php">Books</a></p>
       
       <p style="text-align: center; font-size: 24px">
        <?php 

       echo $row['name'];
        ?>
      </p>
      <br>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="../photos/<?php echo $row['image']; ?>">
        </div>
        <div class="col-md-6">
          <h4 style="font-weight: bold;">Book Description</h4>
          <p><?php echo $row['description']; ?></p>
          <br><br>
          <h4 style="font-weight: bold;">Book Details</h4>
          <table class="table">
            <?php foreach($row as $key => $value){
              if($key == "description" || $key == "image" || $key == "cid" || $key == "name" ){
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "name":
                  $key = "Title";
                  break;
                case "authors":
                  $key = "Author";
                  break;
                  case "edition":
                  $key = "Edition";
                  break;
                  case "publisher":
                  $key = "Publisher";
                  break;
               
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>


            <?php 
              } 
              
            ?>
            <tr>
              <td><a href="read.php?book_isbn=<?php echo $row['book_isbn'];?>">read</a></td>
              
            </tr>
            
            <?php
            if(isset($db)) 
                {
                  mysqli_close($db); 
                }
                ?>

          </table>



<!--- footer-->
   <div class="col-md-12" style="margin-top: 50px;">

      <?php
        include"footer.php";
      ?>

</div>

</body>
</html>