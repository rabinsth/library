<?php
  
  include "navbar.php";
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
      <!-- Example row of columns -->
     <br>
  <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <img class="img-responsive img-thumbnail" src="../photos/<?php echo $row['image']; ?>" style="height: 400px; width: 300px;">
          <p style="font-size: 24px; text-align: center; color: blue;"><?php 

       echo $row['name'];
        ?>
      </p>
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
              <td>
                <a href="read.php?book_isbn=<?php echo $row['book_isbn'];?>"><button class="btn btn-primary">read</button></a>
                </td>
              
            </tr>
            
            <?php
            if(isset($db)) 
                {
                  mysqli_close($db); 
                }
                ?>

          </table>
        </div>
<div class="col-md-12">

  <?php 
  include"footer.php";
  ?>
</div>