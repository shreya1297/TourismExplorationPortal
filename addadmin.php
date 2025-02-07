<?php

session_start();
if(!isset($_SESSION["n"] )or $_SESSION["utype"]!="admin")
		header("location:error.php");
		
		
	require_once("vars.php");
    if(isset($_POST["sub"]))
	{
		$nm=$_POST["name"];
		$add=$_POST["address"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$co=$_POST["co"];
		$gen=$_POST["gen"];
		$dob=$_POST["dob"];
		$phno=$_POST["phone"];
		$username=$_POST["username"];
		$pass=$_POST["password"];
		$cpass=$_POST["cpassword"];
		
		$err=$_FILES["upic"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$fn=$tstamp.$_FILES["upic"]["name"];
			$ftype=$_FILES["upic"]["type"];
			$fsize=($_FILES["upic"]["size"])/1024;
			$ftmpnm=$_FILES["upic"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$fn");
		}
		
		else  $fn="no_image.png";
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
			$conn1=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="insert into signup values         ('$nm','$add','$city','$state','$co','$gen','$dob','$phno','$username','$pass','$fn','admin')";
			
			$q1="select Username from signup where Username='$username'";
			mysqli_query($conn1,$q1) or die("Error in Query".mysqli_error($conn1));
			
			$cnt1=mysqli_affected_rows($conn1);
			if($cnt1==0)
			{
				mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
				$cnt=mysqli_affected_rows($conn);
				if($cnt==1)
				{
					header("location:thnx.php");
				}
			}
			else $msg="Please use a different Username";
	}
	if(isset($_POST["back"]))
	  		header("location:adminpanel.php");
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
  <script src="moment.min.js"></script>
 <script src="pikaday.js"></script>
<script type="text/javascript">
function xyz()
{
	if(document.form1.name.value.length<4)
	{
		alert("please fill your name");
		return false;
	}
	if(document.form1.address.value.length<3)
	{
		alert("please fill your address");
		return false;
	}
	
	if (document.form1.co.selectedIndex == 0) 
	{
 		alert('please choose country');
		return false;
	}
	if(document.form1.gen[0].checked==false&&document.form1.gen[1].checked==false)
	{
		alert("Choose gender");
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
	
	var p1,p2;
	p1=document.form1.password.value
	p2=document.form1.cpassword.value
	if(p1!=p2)
	{
		alert("Passwords doesn't match");
	    return false
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
          <td align="center"><h2>Sign Up</h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337">Name</td>
          <td width="989"><label for="name"></label>
          <input type="text" name="name" id="name" />
          <label for="name2"></label></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><label for="address"></label>
            <input type="text" name="address" id="address" /></td>
        </tr>
        <tr>
          <td>City</td>
          <td><label for="city"></label>
            <input type="text" name="city" id="city" /></td>
        </tr>
        <tr>
          <td>State</td>
          <td><label for="state"></label>
            <input type="text" name="state" id="state" /></td>
        </tr>
        <tr>
          <td>Country</td>
          <td><label for="country"></label>
            <label>
              <select name="co" id="co">
                <option selected="selected">Select</option>
                <option>India</option>
                <option>USA</option>
                <option>UK</option>
                <option>China</option>
                <option>Australia</option>
                <option>Japan</option>
                <option>France</option>
                <option>Italy</option>
                <option>South Africa</option>
                <option>Brazil</option>
                <option>Others</option>
              </select>
            </label></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><p>
            <label>
              <input type="radio" name="gen" value="Male" id="gen_0" />
              Male</label>
            <label>
              <input type="radio" name="gen" value="Female" id="gen_1" />
              Female</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td>Date Of Birth</td>
          <td><label for="dob"></label>
            <input name="dob" type="text" id="dob" readonly="readonly" />
            <script>        
    var picker = new Pikaday(
    {
        field: document.getElementById('dob'),
		format: 'YYYY-MM-DD',
        firstDay: 1,
        maxDate: new Date(),
        yearRange: [1930,2016],
		
    });</script></td>
        </tr>
        <tr>
          <td>Phone No</td>
          <td><label for="phone"></label>
            <input type="text" name="phone" id="phone" onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td>Username(Email Id)</td>
          <td><label for="username"></label>
            <input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><label for="password"></label>
            <input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><label for="cpassword"></label>
            <input type="password" name="cpassword" id="cpassword" /></td>
        </tr>
        <tr>
          <td>Profile Picture</td>
          <td><label>
            <input type="file" name="upic" id="upic" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Sign Up" /> <input type="reset" name="reset" id="reset" value="Clear" />
            <input type="submit" name="back" id="back" value="Back" /></td>
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