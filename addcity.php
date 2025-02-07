<?php
session_start();

if(!isset($_SESSION["n"] )or $_SESSION["utype"]!="admin")
		header("location:error.php");
		
require_once("vars.php");
    if(isset($_POST["sub"]))
	{
	    $cname=$_POST["cat"];
		$scname=$_POST["subcatname"];
		$err=$_FILES["subcatpic"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$scpic=$tstamp.$_FILES["subcatpic"]["name"];
			$ftmpnm=$_FILES["subcatpic"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$scpic");
		}
		
		else  $scpic="no_image.png";
		
		
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="insert into addcity(StateID,CityName,Citypic) values('$cname','$scname','$scpic')";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$msg=" City added successfully";
			}
			else $msg="Error while adding, Please try again";
	
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
		if (document.form1.cat.selectedIndex == 0) 
	{
 		alert('please choose State');
		return false;
	}
	if(document.form1.subcatname.value.length<3)
	{
		alert("please fill your proper Name");
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
          <td align="center"><h2>Add City</h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td>Choose State</td>
          <td><label>
            <select name="cat" id="cat">
              <option>Select</option>
              <?php
			  require_once("vars.php");
					  $conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
					$q="select * from addstate";
				  
					
					$res =mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
					$cnt=mysqli_affected_rows($conn);
					
					if($cnt==0)
					{
						print "<option> No Category available right now</option>";
					}
					else 
					{
						while($x=mysqli_fetch_array($res))
						{
							print "<option value='$x[StateID]'>$x[StateName]</option>";
						}
					}
			
					  
			  ?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td width="337">City Name</td>
          <td width="989"><label for="subcatname"></label>
            <input type="text" name="subcatname" id="subcatname"  onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td>City Picture</td>
          <td><label for="subcatpic"></label>
            <label>
              <input type="file" name="subcatpic" id="subcatpic" />
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Add City" /></td>
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