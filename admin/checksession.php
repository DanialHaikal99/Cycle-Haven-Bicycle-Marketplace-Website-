<?php
// checking if user has logged in
if(empty($_SESSION)) {
	echo "<p style=color:black;>Session expired. Please login again.</p>
		<a href='../login.php'>Go to Login</a>";
	exit;
}
?>