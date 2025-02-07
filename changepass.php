<?php
session_start();

  if(!isset($_SESSION["n"]))
  		header("location:error.php");
require_once("vars.php");
    if(isset($_POST["sub"]))
	{
	
		
		$cpass=$_POST["cpass"];
		$newpass=$_POST["newpass"];
		$cnewpass=$_POST["cnewpass"];
		$un=$_SESSION["un"];
			
				$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
				$q="update signup set Password='$newpass' where Username='$un' and Password='$cpass'";
			  
				
				$res=mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
				$cnt=mysqli_affected_rows($conn);
				
				if($cnt==1)
				{
					$msg="Password changed successfully";
					
					
				}
				else $msg="Incorrect Current Password";
		
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
	var p1,p2;
	p1=document.form1.newpassword.value
	p2=document.form1.cnewpassword.value
	if(p1!=p2)
	{
		alert("Passwords doesn't match");
	    return false
	}
}
</script>
<body>
<table width="1336" border="0">
  <tr>
    <td><?php
    		if($_SESSION["utype"]=="admin")
				require_once("HeaderAdmin.php");
			else
				require_once("Header.php");
			?>
    </td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()">
      <table width="1336" border="0">
        <tr>
          <td align="center"><h2><font color="#FF3366"><strong>Change Password</strong></font></h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337"><strong>Current Password</strong></td>
          <td width="989"><label for="cpass"></label>
            <input type="password" name="cpass" id="cpass" /></td>
        </tr>
        <tr>
          <td><strong>New Password</strong></td>
          <td><label for="newpass"></label>
            <input type="password" name="newpass" id="newpass" /></td>
        </tr>
        <tr>
          <td><strong>Confirm new password</strong></td>
          <td><label>
            <input type="password" name="cnewpass" id="cnewpass" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Change Password" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
          		if(isset($msg))  print $msg;
				?>
           </td>
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