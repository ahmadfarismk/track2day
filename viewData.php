<?php
	include("dbconn.php");
	$sql="select * from user";
	$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);
	if($row == 0){
		echo "No record found";
	}
	else{
		echo"<font size='9'>Users Information</font>";
		echo"<table border=1>";
		echo"<tr>";
		echo"<th>FIRST NAME</th>";
		echo"<th>LAST NAME</th>";
		echo"<th>EMAIL</th>";
		echo"<th>PASSWORD</th>";
		echo"</tr>";
while($row = mysqli_fetch_array($query)) {
		echo"<tr>";
		echo"<td>".$row["user_fname"]."</td>";
		echo"<td>".$row["user_lname"]."</td>";
		echo"<td>".$row["user_email"]."</td>";
		echo"<td>".$row["user_password"]."</td>";
		echo"</tr>";
		}
		echo"</table>";
		echo"<a href='register.php'>register</a><br>";
		echo"<a href='login.php'>login</a>";
	}	
?>