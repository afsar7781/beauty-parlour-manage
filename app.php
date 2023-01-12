<?php
	$firstname = $_POST['firstname'];
	
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $slot = $_POST['slot'];
	// Database connection
	$conn = new mysqli('localhost','root','','Beautywithin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into app(firstname, lastname, gender, email, password, number, service, date, slot) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssisis", $firstname, $lastname, $gender, $email, $password, $number, $service, $date, $slot);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
	
	?>