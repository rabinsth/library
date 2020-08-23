<?php
  include "connection.php";
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		
		body 
		{
  			font-family: "Lato", sans-serif;
  			margin: 0px;
  			padding: 0px;
		}

		.sidenav {
		  height: 100%;
		  margin-top: 50px;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #222;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.img-circle
		{
			margin-left: 20px;
		}
		.h:hover
		{
			color: white;
			width: 300px;
			height: 50px;
			background-color: #00544c;	
		}


		
	</style>
</head>
<body style="background-color: #F2F2F2;">


	<!-- navbar--->
<div class="row" style="margin-bottom: 50px;">
	<div class="col-md-12">
	<?php
	include "navbar.php";
	?>
</div>
</div>
	<!-- ____________________slidenav__________________ -->

	<div id="mySidenav" class="sidenav">
		
  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  	<div style="color: white; margin-left: 60px; font-size: 20px;">
  		<?php
  			if(isset($_SESSION['login_user']))
  			{
		        echo "<img class='rounded-circle' height=120 width=120 src='../admin_photos/".$_SESSION['pic']."'>";
		        echo "</br></br>";
		        echo "Welcome ".$_SESSION['login_user'];
	    	}
	    ?>
	</div>

		<div class="h"> <a href="add_admin.php">Add Admin</a></div>
		<div class="h"> <a href="add.php">Add Books</a></div>
		<div class="h"> <a href="add_category.php">Add Category</a></div>
		<div class="h"> <a href="add_sub_category.php">Add Sub Category</a></div>
		<div class="h"> <a href="update_info.php">Update Info</a></div>
		
		
	   
	    
	</div>

	<!-- _____________ main books________ -->


<div id="main">

  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>


	
<div class="container text-center">
<div class="badge badge-dark text-wrap" style="width: 10rem; height: 3rem; ">
  <p style="text-align: center; font-family: Times New Romam; font-size: 28px; color: white;">All Books</p>
</div>
  <div class="row">


  	<?php
  
  

  $query = "SELECT book_isbn, image, name FROM books";
  $result = mysqli_query($db, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($db);
    exit;
  }

  
  
?>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>

      
      		<br>
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
        		
          <div class="col-sm-6 col-md-2 col-lg-3  " >
          	<div class="book-block" style=" margin-top: 20px; padding: 5px; border: 1px solid #DEEAEE;  border-radius: 10px; background-color: white;">
            <a href="detail.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
            <img src="../photos/<?php echo $query_row['image']; ?>" class="img-fluid" style="height: 300px; width: 210px; margin-top: 25px;" >
            <hr>
              <p style="text-align: center; "> <?php echo $query_row['name'];?></p>
              
            </a>
        </div>
          </div>

          
         

        <?php
          
          }
          } 
          ?>
<br>
      </div>
      </div>
  
</div>
  <div class="col-md-12" style="margin-top: 50px;">

      <?php
      	include"footer.php";
      ?>



</div>

</body>
</html>

<style type="text/css">
	* {
  box-sizing: border-box;
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
  .col-md-3 {
    width: 100%;
  }
}

</style>