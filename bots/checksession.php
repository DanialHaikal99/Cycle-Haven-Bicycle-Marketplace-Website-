<?php
// checking if user has logged in
if(empty($_SESSION)) {
	include("expired.php");
	exit;
}
?>