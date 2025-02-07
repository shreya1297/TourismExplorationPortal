<?php
session_start();
if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
	header("location:error.php");
require_once("vars.php");
$coid=$_GET["coid"];
$con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="Select * from addloc where LocID='$coid' ";
		
		$res=mysqli_query($con,$query) or die("Error in query execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		$x=mysqli_fetch_array($res);
		
		mysqli_close($con);
		
if(isset($_POST["sub"]))
{
	require_once("vars.php");
	$bname=$_POST["brand"];
	$err=$_FILES["bpic"]["error"];
	if($err==0)
	{
		$date=date_create();
		$dt=date_timestamp_get($date);
		$bpic=$dt.$_FILES["bpic"]["name"];
		$filetmp=$_FILES["bpic"]["tmp_name"];			
		move_uploaded_file($filetmp,"uploads/$bpic");
	}
	else
		$bpic="$x[LocPic]";
		
	
	
		$con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="update addloc set LocName='$bname', LocPic='$bpic' where LocID='$coid'";
		
		$res=mysqli_query($con,$query) or die("Error in query execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==1)
		{
			$msg ="Location updated successfully";
			header("location:modifyloc.php");
		}
		else
		{
			$msg="Location couldnot be updated, Please try again";
		}
}

if(isset($_POST["back"]))
	header("location:modifyloc.php");
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
	if(document.form1.brand.value.length<4)
	{
		alert("please fill proper Name");
		return false;
	}
	
}

 
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode != 46 && charCode > 31) 
            && (charCode < 48 || charCode > 57))
             return true;

          return false;
       }
      
</script>
<body>
<table width="1136">
  <tr>
    <td><?php
    	require_once("HeaderAdmin.php");	
	?></td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()" >
      <table width="1335" cellpadding="6" cellspacing="0">
        <tr>
          <td colspan="2" align="center" bgcolor="#F4FCC0"><h1 align="center"><font color="#FF3366">Update Location</font></h1></td>
          </tr>
        <tr>
          <td width="204"><h4>Location</h4></td>
          <td width="920"><label for="brand"></label>
            <input type="text" name="brand" id="brand" value="<?php
            print $x['LocName'];
			?>" onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td><h4>Location Picture</h4></td>
          <td>
            <p>
              <label for="password"></label>
              <label for="bpic"></label>
              </p><?php
			  print "<img src='uploads/$x[LocPic]' height='80' width='60'>";
			  ?>
            <p>Upload Image, if required<br/>
              <input type="file" name="bpic" id="bpic" />
            </p>
            </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Update Location" />
            <input type="submit" name="back" id="back" value="Back" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
          if(isset($msg))
		  {
			  print $msg;
		  }
		  ?></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><?php
    require_once("Footer.PHP");
	?></td>
  </tr>
</table>
</body>
</html>