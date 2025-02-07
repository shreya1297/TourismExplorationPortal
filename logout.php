<?php
	session_start();
	
	  if(!isset($_SESSION["n"]))
  		header("location:error.php");
	
	session_destroy();
	
	header("location:index.php");
?>