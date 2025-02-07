<?php
	session_start();
	require_once("vars.php");
    if(isset($_POST["sub"]))
	{
		$nm=$_POST["name"];
		$phno=$_POST["phone"];
		$username=$_POST["username"];
		$message=$_POST["message"];
		date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d H:i:s");
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="insert into contactus(Name,PhoneNo,Username,Message,Date) values('$nm','$phno','$username','$message','$date')";
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$msg="Thanks for contacting us";
			}
		
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
	if(document.form1.name.value.length<3)
	{
		alert("please fill your name");
		return false;
	}
		if(document.form1.phone.value.length!=10)
	{
		alert("phone number should be of 10 digits");
		return false;
	}
		if(document.form1.username.value.length<1||document.form1.username.value.indexOf("@")<3||document.form1.username.value.indexOf(".")<4)
	{
		alert("please fill proper username/email id");
		return false;
	}
}
function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode != 46 && charCode > 31) 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	   function isNumberKey1(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode != 46 && charCode > 31) 
            && (charCode < 48 || charCode > 57))
             return true;

          return false;
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
          <td align="center"><h2><font color="#FF3366"><strong>Contact Us</strong></font></h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337"><strong>Name</strong></td>
          <td width="989"><label for="name"></label>
          <input type="text" name="name" id="name" onkeypress="return isNumberKey1(event)"/>
          <label for="name2"></label></td>
        </tr>
        <tr>
          <td><strong>Phone No</strong></td>
          <td><label for="phone"></label>
            <input type="text" name="phone" id="phone" onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td><strong>Username(Email Id)</strong></td>
          <td><label for="username"></label>
            <input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
          <td><strong>Message</strong></td>
          <td><label>
            <textarea name="message" cols="30" rows="10" id="message"></textarea>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Submit" /></td>
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