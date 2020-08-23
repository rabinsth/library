<?php
	include"navbar.php";
	include"connection.php";
	

	if(isset($_GET['bookisbn'])){
		$book_isbn = $_GET['bookisbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($book_isbn)){
		echo "Empty bid! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM books WHERE  book_isbn= '$book_isbn'";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($db);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>






<div class="container">
 <form method="post" action="edit_book.php" enctype="multipart/form-data">
    <div class="row" style="margin-top: 80px;">
      <div class="col-25">
        <label for="book_isbn">ISBN</label>
      </div>
      <div class="col-75">
        <input type="text" class ="form-control" name="isbn" value="<?php echo $row['book_isbn'];?>" readOnly="true">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Book Name</label>
      </div>
      <div class="col-75">
       <input type="text" class ="form-control" name="name" value="<?php echo $row['name'];?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="authors">Author</label>
      </div>
      <div class="col-75">
       <input type="text" class ="form-control" name="authors" value="<?php echo $row['authors'];?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="publisher">Publisher</label>
      </div>
      <div class="col-75">
       <input type="text" class ="form-control" name="publisher" value="<?php echo $row['publisher'];?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="edition">Edition</label>
      </div>
      <div class="col-75">
       <input type="text" class ="form-control" name="edition" value="<?php echo $row['edition'];?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
       <textarea name="description" class ="form-control"  rows="5"><?php echo $row['description'];?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="category">Category</label>
      </div>
      <div class="col-75">
       <input type="text" name="category" class ="form-control" value="<?php echo getcatName($db, $row['cid']); ?>" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
      <input type="file" name="image">
      </div>
    </div>
    <br>
    
    <div class="row">
      <input type="submit" value="Submit" name="Submit" class="btn btn-submit">

      <input type="reset" value="Cancel" class="btn btn-reset" >
    </div>
  </form>
  <br>
  <a href="all_books.php" class="btn btn-success">Confirm</a>
</div>










 	<?php
function getcatName($db, $cid){
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

    function getAll($db){
		$query = "SELECT * from books ORDER BY book_isbn DESC";
		$result = mysqli_query($db, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($db);
			exit;
		}
		return $result;
	}

?>


<?php
 include"footer.php";
?>





<style>
  body{
    background-color: #F2F2F2;
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

 