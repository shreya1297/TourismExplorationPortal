<?php
session_start();
if(!isset($_SESSION["n"] )or $_SESSION["utype"]!="admin")
		header("location:error.php");
		
		
require_once("vars.php");
    if(isset($_POST["sub"]))
	{
	
		$cname=$_POST["cname"];
		$err=$_FILES["clogo"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$clogo=$tstamp.$_FILES["clogo"]["name"];
			$ftmpnm=$_FILES["clogo"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$clogo");
		}
		
		else  $clogo="no_image.png";
		
		
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="insert into addloc(LocName,LocPic) values('$cname','$clogo')";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$msg="Location added successfully";
			}
			else $msg="Error while adding, Please try again";
	
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
	background-image: url();
	background-color: #FFFFCC;
}
</style>
</head>

 <script type="text/javascript">
 function xyz()
{
	if(document.form1.cname.value.length<4)
	{
		alert("please fill  proper Location Name");
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
          <td align="center"><h2>Add Location Type</h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337"><strong>Location</strong></td>
          <td width="989"><label for="cname"></label>
            <input type="text" name="cname" id="cname" onkeypress="return isNumberKey(event)" /></td>
        </tr>
        <tr>
          <td><strong>Picture</strong></td>
          <td><label for="clogo"></label>
            <label>
              <input type="file" name="clogo" id="clogo" />
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Add Location" />
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