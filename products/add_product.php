<?php 
	include 'connectdb.php';
	$name = $price = $des = '';
	$nameErr = $priceErr = $desErr = $imageErr = '';
	$check = true;
	if (isset($_POST['addProduct'])) {
		if (empty($_POST['name'])) {
			$check = false;
			$nameErr = "Please input name!";
		} else {
			$name = test_input($_POST['name']);
		}
		if (empty($_POST['price'])) {
			$check = false;
			$priceErr = "Please input price!";
		} else {
			$price = test_input($_POST['price']);
		}
		if (empty($_POST['des'])) {
			$check = false;
			$desErr = "Please input des!";
		} else {
			$des = test_input($_POST['des']);
		}
		$image = $_FILES['image'];
		if ($image == null) {
			$check = false;
			$imageErr = "Please upload file!";
		} elseif ($image["type"] != "image/jpg" && $image["type"] != "image/jpeg" && $image["type"] != "image/png" && $image["type"] != "image/gif") {
			$check = false;
			$imageErr = 'Only allow image file!';
		} elseif ($image["size"] > 5242880) {
			$check = false;
			$imageErr = 'Only allow size image under 5MB!';
		}
			
	if ($check) {
		$nameImage = uniqid().'-'.$image['name'];
		$pathSave = 'image/'.$nameImage;
		move_uploaded_file($image['tmp_name'], $pathSave);
		$sql = "INSERT INTO products(name, price, description, image) VALUES('$name', '$price', '$des', '$nameImage')";
		mysqli_query($connect, $sql);
		header('Location: list_product.php');
	}
	}
 ?>
 <style>
	.err { color: #CF4242; }
</style>
<h1>Add Product</h1>
<form name="AddProduct" method="POST" action="#" enctype="multipart/form-data">
	<p>Name product: </p>
	<a class="err"><?php echo $nameErr ?></a><br>
	<input type="text" name="name">
	<br>
	<p>Price: </p>
	<a class="err"><?php echo $priceErr ?></a><br>
	<input type="number" name="price">
	<br>
	<p>Description: </p>
	<a class="err"><?php echo $desErr ?></a><br>
	<textarea name="des"></textarea>
	<br>
	<p>Image: </p>
	<a class="err"><?php echo $imageErr ?></a><br>
	<input type="file" name="image"><br>

	<input type="submit" name="addProduct" value="Submit">
</form>