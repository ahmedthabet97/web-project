<!DOCTYPE html>
<html>
<head>
	<title>invoice</title>
	<style type="text/css">
		body{
			
			background-image: url("invoice.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		.wel{
			text-align: center;
			color: red;

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
		table
            {
                width: 100%;
            }
            
            table, tr, td
            {
                border: 1px solid black
            }
            #first{
            	font-size: 30px;
            	color: blue;
            	text-align: center;
            	font-weight: bold;
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
</head>
<body>
	<h1 class="wel">invoice</h1>
	<a href="hotelHome.php" id="home">Home</a>
	<div id="content">
		<form method="post">
			<label>customer name</label>
			<input type="text" name="show" required=""><br>
			<button type="submit">show</button>
		</form>
</div>
<?php
		$conn = mysqli_connect("localhost","root","","hotel") or die("can not establish connection ");
		 if($_SERVER['REQUEST_METHOD'] == "POST")
		 {
		 	mysqli_select_db($conn,"hotel");

		 	$name = $_POST['show'];
		 	echo "<h1 class='wel'>invoice of $name</h1>";
		 	$sql="SELECT * FROM invoice WHERE Gname = '$name';";
			$res = mysqli_query($conn, $sql);
			//$row = $res->fetch_array();
		 	$num = mysqli_affected_rows($conn);
		 	//echo "$num";
		 	//$res->num_rows
		 
		 
		 if($res->num_rows > 0)
              {
       	?>
                    
                    <table>
                        <tr id="first">
                            <td>guest name</td>
                            <td>Order</td>
                            <td>Cost</td>
                        </tr>
          			
          	         <?php
                        
                        $sum = 0;
                        while($row=mysqli_fetch_array($res))
                         {
                            echo "
                            <tr>
	                            <td>$row[0]</td>
	                            <td>$row[2]</td>
	                            <td>$row[3]</td>
                            </tr>";
                            $sum += intval($row[3]);
                        }
                        echo "</table>";
	                  }
	                  else{
	                  	echo "<h3 style='text-align: center;color: red'>no guest with this name</h3>";
	                  	$sum=0;
	                  }

                   ?> 
               <h3 style="text-align: center;color: red">Total Cost = <?php echo $sum; }?></h3> 
	 
<div class="error"></div>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			  $("form").on("submit", function(e){ 
					var name = $("input[name='show']").val().trim();
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