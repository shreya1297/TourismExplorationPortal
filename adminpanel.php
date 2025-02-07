<?php 
session_start();
if(!isset($_SESSION["n"] )or $_SESSION["utype"]!="admin")
		header("location:error.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #FFFFCC;
}
</style>
</head>

<body>
<table width="1336" border="0">
  <tr>
    <td><?php
    		require_once("HeaderAdmin.php");
			?>
    </td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="1343" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><h2><font color="#FF3366"><strong>Welcome Admin</strong></font></h2></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><h3>Admin Panel</h3></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><a href="searchuser.php">Search User</a></td>
        </tr>
        <tr>
          <td><a href="listofusers.php">List Of Users</a></td>
        </tr>
        <tr>
          <td><a href="addstate.php">Add State</a></td>
        </tr>
        <tr>
          <td><a href="addcity.php">Add City</a></td>
        </tr>
        <tr>
          <td><a href="addloc.php">Add Location</a></td>
        </tr>
        <tr>
          <td><a href="addatt.php">Add Attraction</a></td>
        </tr>
        <tr>
          <td><a href="addadmin.php">Add Admin</a></td>
        </tr>
        <tr>
          <td><a href="modifystate.php">Modify State</a></td>
        </tr>
        <tr>
          <td><a href="modifycity.php">Modify City</a></td>
        </tr>
        <tr>
          <td><a href="modifyloc.php">Modify Location</a></td>
        </tr>
        <tr>
          <td><a href="modifyatt.php">Modify Attraction</a></td>
        </tr>
        <tr>
          <td><a href="modifycontact.php">View Contact Us</a></td>
        </tr>
        <tr>
          <td><a href="viewfeedback.php">View Feedback</a></td>
        </tr>
        </table>
    </form></td>
  </tr>
  <tr>
    <td><?php
    		require_once("Footer.php");
			?>
    </td>
  </tr>
</table>
</body>
</html>