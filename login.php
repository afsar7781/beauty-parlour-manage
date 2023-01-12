
<?php
$email = $_POST['email'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','Beautywithin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into credentials(email, password) values(?, ?)");
		$stmt->bind_param("ss",$email, $password,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Login successfull...";
		$stmt->close();
		$conn->close();
	}
?>



