<?php
session_start();
if(!isset($_SESSION["n"] )or $_SESSION["utype"]!="admin")
		header("location:error.php");
		
		
require_once("vars.php");
    if(isset($_POST["sub"]))
	{
	    $state=$_POST["state"];
		$city=$_POST["city"];
		$comp=$_POST["comp"];
		$name=$_POST["attname"];
		$descr=$_POST["desc"];
		
	
		$err=$_FILES["att1"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$att1=$tstamp.$_FILES["att1"]["name"];
			$ftmpnm=$_FILES["att1"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$att1");
		}
		
		$err=$_FILES["att2"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$att2=$tstamp.$_FILES["att2"]["name"];
			$ftmpnm=$_FILES["att2"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$att2");
		}
		
	
		
		
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
			$descr=mysqli_real_escape_string($conn,$descr);
			$name=mysqli_real_escape_string($conn,$name);
			$att1=mysqli_real_escape_string($conn,$att1);
			$att2=mysqli_real_escape_string($conn,$att2);
            $q="insert into addatt(StateID,CityID,LocID,AttName,Description,AttPic,AttPic2) values('$state','$city','$comp','$name','$descr','$att1','$att2')";
          
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$msg="Attraction added successfully";
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
	background-color: #FFFFCC;
}
</style>
</head>
<script type="text/javascript">
function xyz()
{
	if (document.form2.state.selectedIndex == 0) 
	{
 		alert('please choose State');
		return false;
	}
			
		if(document.form1.attname.value.length<3)
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
          <td align="center"><h2>Add Attraction</h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337">Choose State</td>
          <td width="989"><label>
            <select name="state" id="state">
              <option>Select</option>
              <?php
					  $conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
					$q="select * from addstate";
				  
					
					$res =mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
					$cnt=mysqli_affected_rows($conn);
					
					if($cnt==0)
					{
						print "<option> No State available right now</option>";
					}
					else 
					{
						while($x=mysqli_fetch_array($res))
						{
							if(isset($_POST["viewcity"]))
								{
									$sid=$_POST["state"];
									if($x['StateID']==$sid)
										print "<option value='$x[StateID]' selected='selected'>$x[StateName]</option>";
									else print "<option value='$x[StateID]'>$x[StateName]</option>";
								}
							else print "<option value='$x[StateID]'>$x[StateName]</option>";
						}
					}
			
					  
			  ?>
            </select>
            <input type="submit" name="viewcity" id="viewcity" value="GO" />
         </label></td>
        </tr>
        <tr>
          <td>Choose City</td>
          <td><label>
            <select name="city" id="city">
              <option>Select</option>
              <?php
					
					if(isset($_POST["viewcity"]))
					{
						  $sid=$_POST["state"];
						  $conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
						$q="select * from addcity where StateID='$sid'";
					  
						
						$res =mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
						$cnt=mysqli_affected_rows($conn);
						
						if($cnt==0)
						{
							print "<option> No City available right now</option>";
						}
						else 
						{
							while($x=mysqli_fetch_array($res))
							{
								 print "<option value='$x[CityID]'>$x[CityName]</option>";
							}
						}
					}
					  
			  ?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Choose Location</td>
          <td><label>
            <select name="comp" id="comp">
              <option>Select</option>
              <?php
					  $conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
					$q="select * from addloc";
				  
					
					$res =mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
					$cnt=mysqli_affected_rows($conn);
					
					if($cnt==0)
					{
						print "<option> No Location available right now</option>";
					}
					else 
					{
						while($x=mysqli_fetch_array($res))
						{
							 print "<option value='$x[LocID]'>$x[LocName]</option>";
						}
					}
			
					  
			  ?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Attraction Name</td>
          <td><label for="attname"></label>
            <input type="text" name="attname" id="attname" onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><label>
            <textarea name="desc" cols="80" rows="10" id="desc"></textarea>
            </label></td>
        </tr>
        <tr>
          <td>Attraction Picture 1</td>
          <td><label for="att1"></label>
            <label>
              <input type="file" name="att1" id="att1" />
            </label></td>
        </tr>
        <tr>
          <td>Attraction Picture 2</td>
          <td><input type="file" name="att2" id="att2" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Add Attraction" />
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