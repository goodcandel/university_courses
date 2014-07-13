<?php

$con = mysqli_connect("localhost","root","","piwheel");

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
	$query = "SELECT ID, description FROM university";
	try {
		$result = mysqli_query($con, $query);
		$i=0;
		while($row = mysqli_fetch_array($result)) {
			$rows[$i] = array($row[0], $row[1]);
			$i++;
		}
		//echo '<pre>', print_r($rows), '</pre>';

	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>University Courses</title>
</head>
<body>
	<div style="text-align:center;">
		<select id="combo">
			<?php for($i=0; $i<=count($rows)-1; $i++) { ?>
				<option value="<?php echo $rows[$i][0]; ?>"><?php echo $rows[$i][1]; ?></option>
			<?php } ?>
		</select>
	</div>

	<div id="aDiv"><p></p></div>

	<!-- javascript -->
	<script src="jquery.min.js"></script>
	<script src="process.js"></script>
</body>
</html>