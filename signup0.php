<?php
session_start();
	
	include("dbconn.php");
	

	$user_email = $_REQUEST['email'];
	$user_fname = $_REQUEST['fname'];
	$user_lname = $_REQUEST['lname'];
	$user_password = $_REQUEST['password'];
	$chosen_adm = $_REQUEST['chosen_adm'];
	
	if ($chosen_adm == 'zarith') {
		$chosen_adm='zarith@gmail.com';
	}
	else if ($chosen_adm == 'auni') {
		$chosen_adm='auni@gmail.com';
	}
	else if ($chosen_adm == 'faris') {
		$chosen_adm='faris@gmail.com';
	}
	else if ($chosen_adm == 'syakir') {
		$chosen_adm='syakir@gmail.com';
	}

	$sqlInsert = "INSERT INTO user VALUES
	('" . $user_email . "','" . $user_fname . "',
	 '" . $user_lname . "','" . $user_password . "', '" . $chosen_adm . "')";
	 
	 mysqli_query($dbconn, $sqlInsert) or die ("Error: " . mysqli_error($dbconn));
	 echo "<script>
	 alert('The data has been added to stored!');
	 </script>";

	echo"<br><a href='menu2.php'>Main page</a>";
	#echo"<br><a href='register.html'>register</a><br>";
	#echo"<a href='login.html'>login</a>";
?>