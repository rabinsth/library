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
        background-color: #F2F3F4;
		}

    .modal {
    padding-right: 0px !important;
}
    
.modal fade {
  padding-right: 0px !important:;
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
	<!-- ____________________slidenav__________________ -->
<div class="col-md-12" style="margin-top: 80px;">
	
		<?php
		include "navbar.php";
		?>
	</div>
<div id="main">

  
  


	<!--____________________________ Search bar___________________ -->

	

	

	<div class="container">
    <div class="row " >
      <div class="col-md-4 "></div>
<div class="col-md-4 text-center">
   <div class="badge badge-dark text-wrap" style="width: 10rem; height: 3rem; ">
  <p style="text-align: center; font-family: Times New Romam; font-size: 28px; color: white;">All Books</p>
</div> 
</div>
</div>



<!----- main body books----------------->


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
        		
          <div class="col text-center " style="margin:5px; border-radius: 10px; background-color: white;">
            <a href="detail.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
            <img class="  block-center img-responsive " src="../photos/<?php echo $query_row['image']; ?>"  style="margin-top: 25px; height: 250px; width: 180px;" >
            <hr>
              <p style="text-align: center;"> <?php echo $query_row['name'];?></p>
              
            </a>
          </div>

          
         

        <?php
          
          }
          } 
          ?>
<br>
      </div>
      </div>

  </div>





  <!--- footer---->


<div class="row">
  <div class="col-md-12" style="margin-top: 50px;">

      <?php
      	include"footer.php";
      ?>
</div>
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



