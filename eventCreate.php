<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$venuetype = $_POST['venuetype'];
    $guestnumber = $_POST['guestnumber'];
    $placement = $_POST['placement'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['note'];

	// Database connection
	$conn = new mysqli('localhost','root','','evento');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, lastname, email, venuetype, guestnumber, placement, date, time, note) 
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssss", $firstname, $lastname, $email, $venuetype, $guestnumber, $placement, $date, $time, $note);
		$execval = $stmt->execute();
		echo $execval;
		echo "Created successfully...";
		$stmt->close();
		$conn->close();
	}
?>