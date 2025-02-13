<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	<style type="text/css">
		body
		{
			background: lightblue;
		}
	.name
	{
		font color: white;
	}
	</style>
</head>
<body>
	<form method="post" action="pdf.php">
	<div class="bor">
		<b class="name">Enter Your Name:-</b>
		<input type="text" name="a1" placeholder="Enter First Name">
		<!-- <input type="text" name="a2" placeholder="Enter Surname"><br><br> -->
		<b>Enter Contact Number:-</b>
		<input class="num"type="text" name="c1" placeholder="Phone Number"><br><br>
		<!-- <b>Enter Your Gender:-</b>
		<input class="user"type="radio" value="male" name="gender">Male -->
		<!-- <input class="user"type="radio" value="Female" name="r1">Female<br><br> -->
		<!-- <b>Enter Your Hobby:-</b>-->
		<input class="hob"type="text" name="h1" placeholder="Hobbies"><br><br>
		
		<input type="submit" name="btn">
	</div>
</form>
</body>
</html>