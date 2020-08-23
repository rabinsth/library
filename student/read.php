<?php
include"connection.php";
$book_isbn = $_GET['book_isbn'];
$query = "SELECT book_isbn,pdf FROM books WHERE book_isbn= '$book_isbn'";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
	$pdf = $row->pdf;
	$target_path = "../pdf/";
	# code...
}
echo "<h1> REad book</h1>";
?>
<br>

<iframe src="<?php echo $target_path.$pdf; ?>" width = "100%" height = "800px";"></iframe>