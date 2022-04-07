<?php
// checking if user has items in cart
if(empty($_SESSION["cart"])) {
	include("cartexpired.php");
	exit;
}
?>