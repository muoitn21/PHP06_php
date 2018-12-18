 <form action="#" method="POST">
 	<input type="text" name="search-key" placeholder="Search products">
 	<input type="submit" name="Search" value="Search">
 </form>
<?php 
	include 'connectdb.php';
	$search = '';
	if (isset($_POST['Search'])) {
		$search = $_POST['search-key'];
	}
	$sql = "SELECT * FROM products WHERE 
		name LIKE '%$search%'
		OR price LIKE '%$search%'
		OR description LIKE '%$search%' ";
	mysqli_set_charset($connect, "utf8");
	$result = mysqli_query($connect, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			echo $row['id']." - ".$row['name']." - ".$row['price']." - ".$row['description']." - <img width='100px' height='100px' src='./image/".$row['image']."'> - ".$row['created']." ";
			echo " <a href='delete_product.php?id=$id'>DELETE</a>";
			echo " | <a href='edit_product.php?id=$id'>EDIT</a>";
			echo '<br>';
		}
	} else {
		echo "No product found";
	}
 ?>