<?php 
	include 'connect.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM products WHERE id = $id";
	mysqli_query($connect, $sql);
	header("Location: list_product.php");
 ?>