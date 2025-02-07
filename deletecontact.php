<?php
session_start();
require_once("vars.php");

$uid=$_GET["uid"];

$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="delete from contactus where Date='$uid'";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				header("location:modifycontact.php");
			}
			else print "Error while deleting , Please try again";
	
	
?>