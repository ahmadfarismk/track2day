<?php
	/* php & mysqldb connection file */
	$user = "root"; 			//mysqlusername
	$pass = ""; 				//mysqlpassword
	$host = "localhost"; 		//server name or ipaddress
	$dbname= "track2daydb2"; 	//your db name

	#echo "<b>User 			: </b>" .$user ."<br>";
	#echo "<b>Password		: </b>" .$pass ."<br>";
	#echo "<b>Host 			: </b>" .$host ."<br>";
	#echo "<b>Database name 	: </b>" .$dbname ."<br>";

	$dbconn= mysqli_connect($host, $user, $pass,$dbname)or die(mysqli_error($dbconn));
?>