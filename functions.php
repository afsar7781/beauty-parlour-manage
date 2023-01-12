<?
	require_once "getstart.php";
	  if (isset($_POST['firstname'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$number = $_POST['number'];
	   
// Database connection
$conn = new mysqli('localhost','root','','Beautywithin');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error)


		  if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
			  $firstname_error = "Name must contain only alphabets and space";
		  }
		  if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
			$lastname_error = "Name must contain only alphabets and space";
		}
		  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			  $email_error = "Please Enter Valid Email ID";
		  }
		  if(strlen($password) < 6) {
			  $password_error = "Password must be minimum of 6 characters";
		  }       
		  
		  if(strlen($number) < 10) {
			$number_error = "Mobile number must be minimum of 10 characters";
		}
	}
  
		 else (!$error) {
			$stmt = $conn->prepare("insert into register(firstname, lastname, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssi", $firstname, $lastname, $gender, $email, $password, $number);
			$execval = $stmt->execute();
			echo $execval;
			echo "Registration successfully...";
			$stmt->close();
			$conn->close();
		  }
		?>