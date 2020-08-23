<?php
  include "connection.php";
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		
		body {
 
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
  color: white;
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
  color: black;
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

@media screen and (max-width: 1000px) {
  .col-25, .col-75 {
    width: 100%;
    margin-top: 0;
  }
}

	</style>


</head>
<body>
	<!--_________________sidenav_______________-->
	<div class="col-md-12" style="margin-bottom: 80px;">
    <?php
     include "navbar.php"; ?>
  </div>


    <div class="container"> 

 
    <h4 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Book Category</b></h4>
    
    <form  action="" method="post">


    <div class="row">
      <div class="col-25">
      
        <label for="book_isbn">Book Category Name</label>
      </div>
      <div class="col-75">
   
        <input type="text" name="cname" class="form-control" placeholder="Category Name" required="" autocomplete="off"><br>
    </div>
  </div>
      <div class="row">
        <input type="submit" value="Add" name="submit" class="btn btn-submit">
        <input type="reset" value="Cancel" class="btn btn-reset" >
      </div>
    </form><br><br>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO category VALUES ('', '$_POST[cname]') ;");
        ?>
          <script type="text/javascript">
            alert("Category Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
</div>
</div>         

</body>


<?php
    include"footer.php";
?>

</html>