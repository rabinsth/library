<?php
	include "navbar.php";
	$result = getAll($db);
	?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
  


<style type="text/css">
	body{
		background-color: #F2F2F2;
	}
	button{
  
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

	
</style>


	</head>
	<body>
		<div class="row" style="margin-bottom: 50px;">
	<div class="col-md-12">
	
</div>
</div>
	
	<div class="container">
	
	<div class="table-responsive"> 
	<table class="table" style="margin-top:  30px;">
		<tr style="background-color: #7BBDC0;">
			<th style="text-align: center;">ISBN</th>
			<th style="text-align: center;">Name</th>
			<th style="text-align: center;">Author</th>
			<th style="text-align: center;">Edition</th>
			<th style="text-align: center;">Description</th>
			<th style="text-align: center;">Category</th>
			<th style="text-align: center;">Sub_Category</th>
			<th style="text-align: center;">Image</th>
			<th style="text-align: center;">Action</th>
			
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td style="text-align: center;"><?php echo $row['book_isbn']; ?></td>
			<td style="text-align: center;"><?php echo $row['name']; ?></td>
			<td style="text-align: center;"><?php echo $row['authors']; ?></td>
			<td style="text-align: center;"><?php echo $row['edition']; ?></td>
			<td style="text-align: center;"><?php echo $row['description']; ?></td>
			<td style="text-align: center;"><?php echo getcatName($db, $row['cid']); ?></td>
			<td style="text-align: center;"><?php echo getScatName($db, $row['sid']); ?></td>
			<td style="text-align: center;">
				<img class="img-responsive img-thumbnail" src="../photos/<?php echo $row['image']; ?>" style="height: 90px; width: 90px;" >
				
					
				</td>
			<td style="text-align: center;"><a href="book_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>"><button style="background-color:#449D44;">Edit</button></a> &nbsp;&nbsp;
			<a href="delete.php?bookisbn=<?php echo $row['book_isbn']; ?>"><button style="background-color: #FC0A0A;">Delete</button></a></td>
			
		</tr>

	
		<?php } ?>
	</table>
</div>
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


function getScatName($db, $sid){
        $query = "SELECT scname FROM sub_category WHERE sid = '$sid'";
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
        return $row['scname'];
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

<div class="col-md-12">
	<?php
	include"footer.php";?>
</div>
   
    </body>
	</html>



