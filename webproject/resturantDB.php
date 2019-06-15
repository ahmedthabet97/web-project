<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		a{
			text-decoration: none;
			border:3px dotted #666699;
			display:block;
			margin: 40px;
			font-size: 50px;
			width: 300px;
			text-align: center;
			background-color: #666699;
			color: white;
		
		}
		#home:hover
		{
			color: red;
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
	 	$name = $_POST['guestName'];
	 	$ord = $_POST['ord'];
	 	$room = $_POST['room'];
	 	$cost = $_POST['cost'];
		mysqli_select_db($conn,"hotel");
		$sql = "CREATE TABLE IF NOT EXISTS invoice(
			Gname varchar(70) NOT NULL,
			GRoom varchar(10) NOT NULL,
			GOrder varchar(150) NOT NULL,
			cost int
		);";

		if ($conn->query($sql) === TRUE) {
	   	 	echo "order table created successfully<br>";
		} 
		else
		 {
	    	echo "Error creating table: " . $conn->error."<br>";
	    }
		$sql = "INSERT INTO invoice(Gname,GRoom,GOrder,cost) 
			VALUES ('$name','$room','$ord','$cost');";
		if (mysqli_query($conn, $sql)) 
		{
	    	echo "your order under complete";
	    	echo "<h2 style='color:blue'>Your order is under processing!</h2>";
		    	echo "<a href='resturant.php' style='text-decoration: none;font-size: 50px;margin-left:350px;'>resturant</a>";
		    	echo "<a href='invoice.php' style='text-decoration: none;font-size: 50px;margin-left:350px;'>show invoice</a>";
	    	//echo mysqli_affected_rows($conn);
		} 
		else 
		{
	    	echo "Error: <br>" . mysqli_error($conn);

		}
	
	}
?>