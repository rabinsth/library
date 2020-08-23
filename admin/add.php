<?php
  include "connection.php";
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: #F2F2F2;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}




.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}


.form-control
{
  background-color: white;
  color: black;
  height: 40px;
}

* {
  box-sizing: border-box;
}

input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #2B679A;
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  height: 35px;
  width: 90px;
  text-align: center;
}


input[type=reset] {
  background-color:#fc0a0a;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  height:35px;
  width: 90px;
  margin-left: 10px;
  text-align: center;
  font-size: 16px;
}



.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;

}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
  
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}



/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75 {
    width: 100%;
    margin-top: 0;
  }
}

	</style>


</head>
<body>
  <div class="col-md-12" style="margin-bottom: 80px;">
    <?php
     include "navbar.php"; ?>
  </div>
  <div class="container">

	   <form  action="add.php" method="post" enctype="multipart/form-data" >

        <div class="row">
        <div class="col-25">
          <label for="book_isbn" style="margin-left: 50px;">ISBN</label>
      </div>
       <div class="col-50">
       <input type="text" name="book_isbn" class="form-control" placeholder="Book ISBN" required="" autocomplete="off"><br>
        </div>
      </div>
       

       <div class="row">
        <div class="col-25 ">
          <label for="name" style="margin-left: 50px;">Book Name</label>
      </div>
       <div class="col-50">
         <input type="text" name="name" class="form-control" placeholder="Book Name" required="" autocomplete="off"><br>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="authors" style="margin-left: 50px;">Author</label>
      </div>
       <div class="col-50">
         <input type="text" name="authors" class="form-control" placeholder="Authors Name" required="" autocomplete="off">
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="edition" style="margin-left: 50px;">Edition</label>
      </div>
       <div class="col-50">
         <input type="text" name="edition" class="form-control" placeholder="Edition" required="" autocomplete="off"><br>
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="cid" style="margin-left: 50px;">Category</label>
      </div>
       <div class="col-50">
         <select name="cid" class="form-control" >
         <option selected="selected"></option>
         <?php
          $query = "SELECT * FROM category ORDER BY cid";
          $result = mysqli_query($db, $query);
           while($row = mysqli_fetch_assoc($result))
            {
          ?>
            <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></option>
          <?php
            }
          ?>
        </select><br>
      </div>
      </div>
        
       
      

       <div class="row">
        <div class="col-25">
          <label for="sid" style="margin-left: 50px;">Sub_Category</label>
      </div>
       <div class="col-50">
         
         <select name="sid" class="form-control" >
         <option selected="selected"></option>
         <?php
          $query = "SELECT * FROM sub_category ORDER BY cid";
          $result = mysqli_query($db, $query);
          while($row = mysqli_fetch_assoc($result))
          {
            $count = 0; 
            $query = "SELECT cid FROM books";
            $result2 = mysqli_query($db, $query);
          ?>
            <option value="<?php echo $row['sid']; ?>"><?php echo $row['scname']; ?></option>
          <?php
          }
          ?>
          </select><br>
          </div>
          </div>
  
        
        <div class="row">
        <div class="col-25" >
          <label for="publisher" style="margin-left: 50px;">Publisher</label>
      </div>
       <div class="col-50">
        <input type="text" name="publisher" class="form-control" placeholder="Publisher" required="" autocomplete="off"><br>
        </div>
      </div>



      <div class="row">
        <div class="col-25 ">
          <label for="description" style="margin-left: 50px;">Description</label>
      </div>
       <div class="col-50">
         <textarea name="description" class ="form-control"  rows="5"><?php echo $row['description'];?></textarea>
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="image" style="margin-left: 50px;">Book Image</label>
      </div>
       <div class="col-50">
        <input  class="form-control" type="file" name="image" required=""><br>
        </div>
      </div>


      
      <div class="row">
        <div class="col-25">
          <label for="pdf" style="margin-left: 50px;">Book PDF</label>
      </div>
       <div class="col-50">
        <input  class="form-control" type="file" name="pdf" required="" ><br>
        </div>
      </div> 


      <div class="row" >
        <input type="submit" value="Add" name="Submit" class="btn btn-submit">
        <input type="reset" value="Cancel" class="btn btn-reset" >
      </div> 
        
    </form><br><br>
  </div>
  

<?php
     if(isset($_POST['Submit']))
    {

       $book_isbn=$_POST['book_isbn'];
      $name=$_POST['name'];
      $author=$_POST['authors'];
      $edition=$_POST['edition'];
      $cid =$_POST['cid'];
       $sid =$_POST['sid'];
      $publisher=$_POST['publisher'];
      $description=$_POST['description'];
      $target_path = "../photos/";
      $target_path1 = "../pdf/";
      $target_path1 = $target_path1 . basename($_FILES['pdf']['name']);

      $target_path = $target_path . basename($_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
      move_uploaded_file($_FILES['pdf']['tmp_name'], $target_path1);

     

        $sql= "INSERT INTO books(`book_isbn`,`name`,`authors`,`edition`,`cid`,`sid`,`publisher`,`description`,`image`,`pdf`) VALUES ( '$book_isbn','$name','$author','$edition','$cid', '$sid','$publisher','$description','$target_path', '$target_path1')";
        if($db->query($sql) === TRUE){
          echo "<br><br>";

        }
        else
        {
          echo "Error: " . $sql . "<br>" . $db->error;
        }
        $db->close();
     
    }
  
?>

<div class="col-md-12" style="margin-top: 50px;">
<?php
    include"footer.php";
?>
</div>
</body>
</html>





