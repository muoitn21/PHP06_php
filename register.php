<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<title>REGISTER</title>
</head>
<style>
	.err {color: #CF4242}
</style>
<body>
<?php 
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = '18php06_demo';
	$connect = mysqli_connect($server, $username, $password, $database);
	if (mysql_connect_errno()){
		echo "Khong thanh cong". mysql_connect_error();
	} else {
		echo "Thanh cong!";
	}
	mysql_set_charset($connect,"utf8");

	$name = $username = $password = $gender = $city = "";
	$nameErr = $usernameErr = $passwordErr = $genderErr = $cityErr = "";
	$check = true;
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$city = $_POST['city'];
		if (empty($_POST["name"])) {
			$check = false;
			$nameErr = "Please input your name! <br>";
		} else {
			$name = test_input($_POST["name"]);
		}
		if (empty($_POST["username"])) {
			$check = false;
			$usernameErr = "Please input your username! <br>";
		} else {
			$username = test_input($_POST["password"]);
		}
		if (empty($_POST["password"])) {
			$check = false;
			$passwordErr = "Please input your password! <br>";
		} else {
			$password = test_input($_POST["password"]);
		}
		if (empty($_POST["gender"])) {
			$check = false;
			$genderErr = "Please choose your gender! <br>";
		} else {
			$gender = test_input($_POST["gender"]);
		}
		if (empty($_POST["city"])) {
			$check = false;
			$cityErr = "Please choose your city! <br>";
		} else {
			$city = test_input($_POST["city"]);
		}
		if($check) { 
			$sql = "INSERT INTO users(name, username, password, gender, city) VALUES('$name','$username','$password','$gender','$city')";
			mysqli_query($connect, $sql);
			$register = "SUCCESS!";
		}
	}
?>
<h1>REGISTER FORM</h1>
<form name = users method="post" action="#">
	<p>Name:<input type="text" name="name" value="<?php echo $name?>">
			<span class="err"><?php echo $nameErr;?></span>
	</p>

	<p>Username:<input type="text" name="username" value="<?php echo $username?>">
			<span class="err"><?php echo $usernameErr;?></span>
	</p>

	<p>Password:<input type="password" name="password" value="<?php echo $password?>">
			<span class="err"><?php echo $nameErr;?></span>
	</p>

	<p>Gender:
		<input type="radio" name="gender" value="male" 
			<?php 
				if($gender == 'male'){
					echo "checked";
				}?>> MALE <br>
		<input type="radio" name="gender" value="female" 
			<?php 
				if($gender == 'female'){
					echo "checked";
				}?>> FEMALE <br>
		<span class="err"><?php echo $genderErr;?></span>
	</p>

	<p>City:
			<select name="city">
				<option value="">Choose city</option>
				<option value="dn">Da Nang</option>
				<option value="hn">Ha Noi</option>
				<option value="hcm">Ho Chi Minh</option>
			</select>
			<span class="err"><?php echo $errCity;?></span>
	</p>
	<input type="submit" name="register" value="REGISTER">
</form>
</body>
</html>