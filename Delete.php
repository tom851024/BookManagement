<?php 
session_start();
$num = $_GET["id"];
unset($_SESSION["data"][$num]);
$_SESSION["data"] = array_values($_SESSION["data"]);
header("location: index.php");
?>