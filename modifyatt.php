<?php
session_start();
if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
	header("location:error.php");
	
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
{		if (document.form1.state.selectedIndex == 0) 
	{
 		alert('please choose State');
		return false;
	}
	
	/*	if (document.form1.city.selectedIndex == 0) 
	{
 		alert('please choose City');
		return false;
	}*/
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
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()">
      <table width="1332" cellpadding="6" cellspacing="0">
        <tr>
          <td colspan="2" align="center" bgcolor="#F4FCC0"><h1 align="center"><font color="#FF3366">Modify Attraction</font></h1></td>
          </tr>
        <tr>
          <td width="200"><h4>Choose State</h4></td>
          <td width="1111"><label for="state"></label>
            <select name="state" id="state">
              <option>Select</option>
              <?php
			  require_once("vars.php");
			  $con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="select * from addstate";
		
		$res=mysqli_query($con,$query) or die("Error in query execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==0)
		{
			print "<option>State not available</option> ";
		}
		else
		{
			while($x=mysqli_fetch_array($res))
			{	if(isset($_POST["viewcity"]))
				{
					$sid=$_POST["state"];
					if($x[StateID]==$sid)
						print "<option value='$x[StateID]' selected='selected'>$x[StateName]</option>";
					else
						print "<option value='$x[StateID]'>$x[StateName]</option>";
				}
				else
					print "<option value='$x[StateID]'>$x[StateName]</option>";	
			}
		}  
			  ?>
            </select> <input type="submit" name="viewcity" id="viewcity" value="View City List" /></td>
        </tr>
        <tr>
          <td><strong>Choose City</strong></td>
          <td><label for="city"></label>
            <select name="city" id="city">
              <option>Select</option>
              <?php
			  if(isset($_POST["viewcity"]))
			  {
				  $sid=$_POST["state"];
			  require_once("vars.php");
			  $con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="select * from addcity where StateID='$sid'";
		
		$res=mysqli_query($con,$query) or die("Error in query execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==0)
		{
			print "<option>State not available</option> ";
		}
		else
		{
			while($y=mysqli_fetch_array($res))
			{	
				print "<option value='$y[CityID]'>$y[CityName]</option>";	
			}
		}  
			  }
			  ?>
            </select>
            <input type="submit" name="viewattraction" id="viewattraction" value="View Attractions" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="back" id="back" value="Back" /></td>
        </tr>
        <tr>
          <td colspan="2"><?php
		  if(isset($_POST["viewattraction"]))
		  {
	require_once("vars.php");
		$sid=$_POST["state"];
		$cid=$_POST["city"];
		$con2=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query2="select * from addatt where StateID='$sid' and CityID='$cid'";
		
		
		
		$res2=mysqli_query($con2,$query2) or die("Error in query execution and error is : ".mysqli_error($con2));
				
		$count2=mysqli_affected_rows($con2);
		
		if($count2==0)
		{
			print "No records ";
		}
		else
		{
			print "<table align='center' width='1335' cellspacing='0' cellpadding='5'>
						<tr bgcolor='#6699FF' height='50'>
							<th>Attraction Picture</th>
							<th>Attraction Picture</th>
							<th>Attraction Name</th>
							<th>Description</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>";
						$cnt=1;
			while($z=mysqli_fetch_array($res2))
			{
				/*$z['Description']=mysqli_real_escape_string($con,$z['Description']);
			$z['AttName']=mysqli_real_escape_string($con,$z['AttName']);
			$z['AttPic']=mysqli_real_escape_string($con,$z['AttPic']);
			$z['AttPic2']=mysqli_real_escape_string($con,$z['AttPic2']);*/
				if($cnt%2==0)
					{
						print "<tr bgcolor='#FFFFCC'>
							<td><img src='uploads/$z[AttPic]' height='80' width='80'></td>
							<td><img src='uploads/$z[AttPic2]' height='80' width='80'></td>
							<td>$z[AttName]</td>
							<td>$z[Description]</td>
							<td><a href=updateatt.php?aid=$z[AttID]>Update</a></td>
							<td><a href=deleteatt.php?aid=$z[AttID]>Delete</a></td>
						</tr>";	
					}
				else
				 {
					 print "<tr bgcolor='#99FFFF'>
							<td><img src='uploads/$z[AttPic]' height='80' width='80'></td>
							<td><img src='uploads/$z[AttPic2]' height='80' width='80'></td>
							<td>$z[AttName]</td>
							<td>$z[Description]</td>
							<td><a href=updateatt.php?aid=$z[AttID]>Update</a></td>
							<td><a href=deleteatt.php?aid=$z[AttID]>Delete</a></td>
						</tr>";	
				 }
				 $cnt++;
			}
			print "</table>";
		}
		}
?></td>
          </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><?php
    require_once("Footer.php");
	?></td>
  </tr>
</table>
</body>
</html>