<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    	$name = $_POST['check'];
    	$conn = mysqli_connect("localhost","root","","hotel") or die("can not establish connection ");
    	$result = mysqli_query($conn,"SELECT * from reception where custName='$name';");
    	mysqli_select_db($conn,"hotel");
    	$row = $result->fetch_array();

    	$orders = mysqli_query($conn,"SELECT * from invoice where Gname='$name'");
    	$num = mysqli_affected_rows($conn);
    	$total = 0;
    	if($num>0)
    	{
    		
	    	while($order = mysqli_fetch_array($orders))
	        {
	            $total += intval($order[3]);
	        }
	    }
        //total hotel reservation
        $checkIn= strtotime($row["checkIn"]);
        $checkOut = strtotime($row["checkOut"]);
        $days      = date("d", ($checkOut-$checkIn));
        $totalRoom = ($days * 200);
       // echo $totalRoom;





    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>check out</title>
	<style type="text/css">
		body{
			
			background-image: url("bye.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		#wel{
			text-align: center;
			color: #000066;

		}
		#content{
			width: 1100px;
			margin-left: 100px;
			border: 5px inset blue;
		}
		#content label
		{
			color: #003399;
			font-size: 30px;
			font-weight: bold;
			font-family:fangsong,sans-serif;
			margin-left: 150px;
			margin-right: 100px;
		}
		#content input 
		{
			width: 300px;
			margin-top: 30px;
			height:40px;
			font-size: 30px;
			color: #000066;
			
		}
		button
		{
			width: 200px;
			height: 50px;
			color: #000066;
			font-size: 20px;
			margin-left: 400px;
			margin-top: 40px;
			margin-bottom: 40px;
		}
		#home
		{
			text-decoration: none;
			font-size: 30px;
			margin: 10px;
			font-weight:bold;
			color: blue;
		}
		#home:hover
		{
			color: red;
		}
	</style>
	</style>
</head>
<body>
	<h1 id="wel">check Out</h1>
	<a href="hotelHome.php" id="home">Home</a>
	<div id="content">
		<form method="post">
			<label>customer name</label>
			<input type="text" name="check" required=""><br>
			<button type="submit">check out</button>

		</form>

</div>
<?php
                if(isset($total))
                {
                    echo "<p>Total Restaurant = $total</p>";
                    echo "<p>Total Roombooking = $totalRoom ($days days)</p>";
                    echo "<p>Total Reservation = ".($totalRoom + $total)."</p>";
                }
                // else{
                //     echo "<p>Total Roombooking = $totalRoom ($days days)</p>";
                //     echo "<p>Total Reservation = ".$totalRoom ."</p>";
                // }

            ?>
<div class="error"></div>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			  $("form").on("submit", function(e){ 
					var name = $("input[name='check']").val().trim();
					name=name.split(" ");
					if(name.length!=3)
					{
						$(".error").html("<p style='color:blue;font-size: 30px;'>error: The name should be triple</p>");
						e.preventDefault();

					}
				});
		});
	</script>

</body>
</html>