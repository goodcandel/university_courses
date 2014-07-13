<?php

$univ_id = $_POST['univ_id'];

//$con = mysqli_connect("PiWheel123.db.10962756.hostedresource.com","PiWheel123","P@ssw0rd90906","PiWheel123");
$con = mysqli_connect("localhost","root","","piwheel");

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
	$query = "SELECT Name,Image,Rating FROM course WHERE UniveristyID = {$univ_id}";
	try {
		$result = mysqli_query($con, $query);
		$i=0;
		while($row = mysqli_fetch_array($result)) {
			$rows[$i] = array($row[0], $row[1], $row[2]);
			$i++;
		}
		if(!empty($rows)) {
			echo json_encode($rows);
		} else {
			echo "No courses.";
		}

	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
}

?>