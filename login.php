<?php
  $fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into azide(fullname, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $fullname, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "submit callback process";
		$stmt->close();
		$conn->close();
	}
  ?>