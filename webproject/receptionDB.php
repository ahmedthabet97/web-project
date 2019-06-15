<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		a{
			text-decoration: none;
			border:3px solid #666699;
			display:block;
			width:300px;
			font-size: 20px;
			text-align: center;
			background-color: #99CCFF;
		}
	</style>
</head>
<body>

</body>
</html>
<?php
	include 'config.php';
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$credit = $_POST['custCredit'];
        $name = $_POST['custName'];
        $in = $_POST['checkIn'];
        $out = $_POST['checkOut'];
        $room = $_POST['room'];
	
	mysqli_select_db($conn,"hotel");
	$sql = "CREATE TABLE IF NOT EXISTS reception(
		custId VARCHAR(14) NOT NULL,
		custName VARCHAR(70) NOT NULL,
		checkIn date NOT NULL,
		checkOut date NOT NULL,
		room VARCHAR(10) NOT NULL
	);";
	if ($conn->query($sql) === TRUE) {
	    echo "reception table created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error."<br>";
	}
	
		$res="SELECT * FROM reception WHERE room='$room' and checkIn='$in' and checkOut ='$out' ";
		mysqli_query($conn, $res);
		$aff = mysqli_affected_rows($conn);
		if ($aff>0) {
			echo "<h2 style='color:red'>please try again this room is reserved or change this room!</h2> <br>";
			echo "<a href='reception.php' style='text-decoration: none;font-size: 50px;'>Resrve Again</a>";
		}
		else
		{
			$sql = "INSERT INTO reception(custId,custName,checkIn,checkOut,room) 
					VALUES ('$credit','$name','$in','$out','$room');";
			if (mysqli_query($conn, $sql)) 
			{
		    	echo "<h2 style='color:blue'>the reservation is complete!</h2>";
		    	echo "<a href='reception.php' style='text-decoration: none;font-size: 50px;'>Reception</a>";
			} 
			else 
			{
		    	echo "Error: <br>" . mysqli_error($conn);

			}
		}
	}
	?>
