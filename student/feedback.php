<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	

</head>
<body>

            
            
           
         

	

		
<div class="modal fade" id="myModal5" role="dialog">
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