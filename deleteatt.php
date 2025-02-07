<?php
session_start();
if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
	header("location:error.php");
require_once("vars.php");

$aid=$_GET["aid"];
$con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error);
		
		$query="delete from addatt where AttId='$aid'";
		
		$res=mysqli_query($con,$query) or die("Error in query execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==1)
			header("location:modifyatt.php");
		else
			print "Error while Deleting, Please try again";
		
?>