<!DOCTYPE html>
<html>
<head>
	<title>resturant</title>
	<style type="text/css">
		body{
			
			background-image: url("food.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		#wel{
			text-align: center;
			color: #000066;

		}
		#h3
		{
			color: green;
			text-align: center;
			font-size: 30px;
		}
		#content{
			width: 1100px;
			margin-left: 150px;
			border: 5px inset blue;
		}
		#content label
		{
			color: #003399;
			font-size: 30px;
			font-weight: bold;
			font-family:fangsong,sans-serif;
			margin-left: 350px;
		}
		#content input ,select,textarea
		{
			width: 300px;
			height:40px;
			margin:10px;
			font-size: 30px;
			color: #000066;
			
		}
		#save
		{
			width: 200px;
			height: 50px;
			color: #000066;
			font-size: 20px;
			margin-left: 500px;
			margin-top: 40px;
			margin-bottom: 40px;
		}
		a,h2{
			text-decoration: none;
			display:block;
			margin: 40px;
			//font-size: 25px;
			width: 200px;
			text-align: center;
			display: inline;
		}
		a:hover
		{
			color: red;
		}
	</style>
</head>
<body>
	<h1 id="wel">welcome to resturant</h1>
	<div id="content">
		<h3 id="h3">Orders</h3>
		<h2><a href="hotelHome.php" id="home">Home</a></h2>
		<h2><a href="invoice.php" id="home">show invoice</a></h2>
		<div id="order">
			<form method="post" action="resturantDB.php">
				<label>Guest Name</label>
				<input type="text" name="guestName" placeholder="GuestName" required><br>
				<label>Guest room</label>
				<select name="room">
						room<?php
						for ($i=1; $i <=10 ; $i++) { 
							echo "<option>room".$i."</option>";
						}
						?>
					<
				</select><br>
				<label>order</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<textarea name="ord" required></textarea><br>
				<label>Cost EGP</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="number" name="cost" required>
				<button type="submit" id="save">save</button>

		</div>
	</div>
	<div class="error"></div>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			  $("form").on("submit", function(e){ 
					var name = $("input[name='guestName']").val().trim();
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