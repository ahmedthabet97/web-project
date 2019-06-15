<!DOCTYPE html>
<html>
<head>
	<title>reception</title>
	<style type="text/css">
		body{
			
			background-image: url("recpt.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		#wel{
			text-align: center;
			color: #000066;

		}
		#content{
			width: 1100px;
			margin-left: 150px;
			border: 5px inset blue;
		}

		#content label
		{
			color: #003399;
			font-size: 40px;
			font-weight: bold;
			font-family:fangsong,sans-serif;
			margin-left: 300px;
		}
		#content input ,select
		{
			width: 300px;
			height:40px;
			margin:10px;
			font-size: 30px;
			color: #000066;
			
		}
		button{
			width: 200px;
			height: 50px;
			color: #000066;
			font-size: 20px;
			margin-left: 500px;
			margin-top: 40px;
			margin-bottom: 40px;
		}
		a
		{
			text-decoration: none;
			font-size: 25px;
			margin: 10px;
			font-weight:bold;
			color: blue;
		}
		a:hover
		{
			color: red;
		}

	</style>
</head>
<body>
	
	<h1 id="wel">reception</h1>
	<a href="hotelHome.php" id="home">Home</a>
	<a href="checkOut.php" id="check">Check Out</a>

	<div id="content">
		<form method="post" action="receptionDB.php">
			<label>customer credit</label>&nbsp;&nbsp;
			<input type="number" name="custCredit" placeholder="customer credit"required ><br>
			<label>customer name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="custName" placeholder="customer name" required><br>
			<label>check in</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="date" name="checkIn" required><br>
			<label>check out</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="date" name="checkOut" required></input><br>
			<label>room number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="room">
					room<?php
					for ($i=1; $i <=10 ; $i++) { 
						echo "<option>room".$i."</option>";
					}
					?>
				
			</select><br>
			<button type="submit">reserve</button>
			
		</form>
		<div class="error"></div>
	</div>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			  $("form").on("submit", function(e){ 
			  		$(".error").html("");
					if(Date.parse($("input[name='checkOut']").val()) <= Date.parse($("input[name='checkIn']").val()))
					{
						$(".error").html($(".error").html() + "<p style='color:red;font-size: 30px;'> error:The date of checkIn must before  the checkOut</p>");
						e.preventDefault();
					}
					var name = $("input[name='custName']").val().trim();
					name=name.split(" ");
					if(name.length!=3)
					{
						$(".error").html("<p style='color:red;font-size: 30px;'>error: The name should be triple</p>");
						e.preventDefault();

					}
				});
		});
	</script>
</body>
</html>