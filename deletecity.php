<?php
session_start();
require_once("vars.php");

$cid=$_GET["cid"];

$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="delete from addcity where CityID='$cid'";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				header("location:modifycity.php");
			}
			else print "Error while deleting , Please try again";
	
	
?>