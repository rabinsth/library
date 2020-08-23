<?php
	include "connection.php";
	$book_isbn= $_GET['bookisbn'];
	$username = $_GET['username'];

	
	
	$query = "DELETE FROM books WHERE book_isbn = '$book_isbn'";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($db);
		exit;
	}
	header("Location: all_books.php");





	$query = "DELETE FROM feedback WHERE username = '$username'";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($db);
		exit;
	}
	header("Location: feedback.php");
?>