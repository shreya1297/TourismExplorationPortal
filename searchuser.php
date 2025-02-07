<?php
session_start();
if(!isset($_SESSION["n"])and $_SESSION["utype"]!="admin")
	header("location:error.php");
require_once("vars.php");
    if(isset($_POST["sub"]))
	{
	
		$username=$_POST["username"];
		
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="select * from signup where Username='$username'";
          
			
			$res=mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$x=mysqli_fetch_array($res);
			}
			else $msg="No records found";
	
	}
	
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
<script type="text/javascript">
function xyz()
{
	if(document.form1.username.value.length<1||document.form1.username.value.indexOf("@")<3||document.form1.username.value.indexOf(".")<4)
	{
		alert("please fill proper username/email id");
		return false;
	}
}
</script>

<body>
<table width="1336" border="0">
  <tr>
    <td><?php
    		require_once("HeaderAdmin.php");
			?>
    </td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()">
      <table width="1336" border="0">
        <tr>
          <td align="center"><h2>Search User</h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337">Username(Email Id)</td>
          <td width="989"><label for="username"></label>
            <input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Search" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
          		if(isset($msg))  print $msg;
				?>
           </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
		    if(isset($x))
			{
				print "<table>
							<tr>
							<th>Profile Picture</th>
							<td><img src='uploads/$x[Profilepic]' height='50'></td>
						</tr>
						<tr>
							<th>Name</th>
							<td>$x[Name]</td>
						</tr>
						<tr>
							<th>Address</th>
							<td>$x[Address]</td>
						</tr>
						<tr>
							<th>City</th>
							<td>$x[City]</td>
						</tr>
						<tr>
							<th>State</th>
							<td>$x[State]</td>
						</tr>
						<tr>
							<th>Country</th>
							<td>$x[Country]</td>
						</tr>
						<tr>
							<th>Gender</th>
							<td>$x[Gender]</td>
						</tr>
						<tr>
							<th>DateOfBirth</th>
							<td>$x[DateOfBirth]</td>
						</tr>
						<tr>
							<th>PhoneNo</th>
							<td>$x[PhoneNo]</td>
						</tr>
						<tr>
							<th>Username</th>
							<td>$x[Username]</td>
						</tr>
						<tr>
							<th>Password</th>
							<td>$x[Password]</td>
						</tr></table>";
			}
					
          
		  ?></td>
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