<?php
session_start();
require_once("vars.php");

$sid=$_GET["sid"];

$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="delete from addstate where StateID='$sid'";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				header("location:modifystate.php");
			}
			else print "Error while deleting , Please try again";
	
	
?>