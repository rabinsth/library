<?php	
	
	include "navbar.php";
	// if save change happen
	if(!isset($_POST['Submit'])){
		echo "Something wrong!";
		exit;
	}

	$isbn = trim($_POST['isbn']);
	$name = trim($_POST['name']);
	$authors = trim($_POST['authors']);
	$description = trim($_POST['description']);
	$edition = trim($_POST['edition']);
	$publisher = trim($_POST['publisher']);
	$category = trim($_POST['category']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../photos/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	
	// if publisher is not in db, create new
	$findcat = "SELECT * FROM category WHERE cname = '$category'";
	$findResult = mysqli_query($db, $findcat);
	if(!$findResult){
		// insert into publisher table and return id
		$insertcat = "INSERT INTO category(cname) VALUES ('$category')";
		$insertResult = mysqli_query($db, $insertcat);
		if(!$insertResult){
			echo "Can't add new publisher " . mysqli_error($db);
			exit;
		}
	}


	$query = "UPDATE books SET  
	name = '$name', 
	authors = '$authors', 
	description = '$description', 
	edition = '$edition',
	publisher = '$publisher'";


	if(isset($image)){
		$query .= ", image='$image' WHERE book_isbn = '$isbn'";
	} else {
		$query .= " WHERE book_isbn = '$isbn'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($db);
		exit;
	} else {
		header("Location: book_edit.php?bookisbn=$isbn");
	}
	?>
	