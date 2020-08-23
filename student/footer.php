<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<style type="text/css">

	.modal {
    padding-right: 0px !important;
}
.modal fade {
  padding-right: 0px !important:;
}
	</style>

</head>
<body>
	<nav class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark" style="height: 50px;">


	<?php 
	include"connection.php";
	if(isset($_SESSION['login_user']))
            {
            	?>


<div class="col-md-4"></div>
		<div class="col-md-4 text-center"> 
  
   
		<p style="color: white;">All right Reserve</p>
  
</div>

<div class="col-md-4 text-center">
	<button type="button" class="btn btn-link fixed-bottom" data-toggle="modal" data-target="#myModal5"
                style="color: #D67B22;"><i class="fa fa-commenting"></i>FEEDBACK 
            </button>


</div>

<?php 
}
else
{
	?>

<div class="col-md-12 text-center"> 
  
   
		<p style="color: white;">All right Reserve</p>
  
</div>
	<?php
	}
	?>	

  </nav>

		
<div class="modal" id="myModal5" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Feedback</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form  name="feedback" action="" method="post">
          	<textarea class="form-control" name="feedback" placeholder="Your feedback!!"></textarea>
       
       <button class="btn btn-link" type="submit" name="submit5" style="float: right; margin-right: 15px;"><i class="fa fa-send" style="font-size: 36px; color: blue"></i></button>
          
    </form>
      </div>
        
        
      </div>
      
    </div>
  
</div>


</body>
</html>

<?php

      if(isset($_POST['submit5']))
      {
      	 $feedback=$_POST['feedback'];
        
         $sql = "INSERT INTO feedback(`username`,`message`) VALUES('$_SESSION[login_user]', '$feedback')";
         if($db->query($sql) === TRUE){
        ?>
          <script type="text/javascript">
           alert("Thanks For your Feedback");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("Sorry Send Again.");
            </script>
          <?php

        }

      }

    ?>