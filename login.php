<?php
session_start();
require_once("vars.php");
    if(isset($_POST["sub"]))
	{
	
		$username=$_POST["username"];
		$pass=$_POST["password"];
		
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="select * from signup where Username='$username' and Password='$pass'";
          
			
			$res=mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$x=mysqli_fetch_array($res);
				$_SESSION["n"]=$x['Name'];
				$_SESSION["un"]=$x['Username'];
				$_SESSION["utype"]=$x['UserType'];
				$_SESSION["ppic"]=$x['ProfilePic'];
				
				if($x['UserType']=="admin")
						header("location:adminpanel.php");
				else if(isset($_GET["cid"]))
					   {
							$cid=$_GET["cid"];
							header("location:showatt.php?cid=$cid");
						}
				else
						header("location:Index.php");
					
			}
			else $msg="Incorrect Username/Password";
	
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
	background-image: url();
	background-repeat: no-repeat;
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
    		require_once("Header.php");
			?>
    </td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()">
      <table width="1336" border="0">
        <tr>
          <td align="center"><h2><font color="#FF3366"><strong>Login</strong></font></h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337"><strong>Username(Email Id)</strong></td>
          <td width="989"><label for="username"></label>
            <input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
          <td><strong>Password</strong></td>
          <td><label for="password"></label>
            <input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Login" /></td>
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