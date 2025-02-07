<?php
session_start();
if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
	header("location:error.php");
require_once("vars.php");
	$sid=$_GET["sid"];

			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="select * from addstate where StateID='$sid'";
          
			
			$res=mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			
			$x=mysqli_fetch_array($res);
			
			mysqli_close($conn);
			
    if(isset($_POST["sub"]))
	{
	
		$catname=$_POST["catname"];
		$err=$_FILES["catpic"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$catpic=$tstamp.$_FILES["catpic"]["name"];
			$ftmpnm=$_FILES["catpic"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$catpic");
		}
		
		else  $catpic="$x[StatePic]";
		
		
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="update addstate set StateName='$catname',StatePic='$catpic' where StateID='$sid' ";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				header("location:modifystate.php");
			}
			else $msg="Error while updating, Please try again";
	
	}
	if(isset($_POST["back"]))
			header("loaction:modifystate.php");
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
	if(document.form1.catname.value.length<3)
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
          <td align="center"><h2>Update State</h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337">State Name</td>
          <td width="989"><label for="catname"></label>
            <input type="text" name="catname" id="catname" value="<?php print $x['StateName']; ?>" onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td>State Picture</td>
          <td><label for="catpic"></label>
            <label>
              <?php
			  		print "<img src='uploads/$x[StatePic]' height='50' width='100'>";
              ?>
              <br />
              <font size="2">Choose an image, if required</font><br />
              <input type="file" name="catpic" id="catpic" />
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Update State" />
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