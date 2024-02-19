<?php
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$password = $_POST['Password'];

	// Database connection
	$conn = new mysqli('localhost','root','','Phile');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Username, Email, Password) values(?, ?, ?)");
		$stmt->bind_param("sss", $Username, $Email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
