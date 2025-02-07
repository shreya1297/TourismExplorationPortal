<?php
    
	session_start();
	
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
	if (document.form1.loc.selectedIndex == 0) 
	{
 		alert('please choose Location');
		return false;
	}
}
</script>
<body>
<table width="1336" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>	
	<?php
  if($_SESSION["n"])
  {
		if($_SESSION["utype"]=="admin")
			include_once("HeaderAdmin.php");
		else include_once("Header.php");
  }
  	else header("location:error.php");
	?></td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()">
      <table width="1336" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td width="365"><h2><strong>Search Attraction</strong> by City</h2></td>
          <td width="963">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Choose State</strong></td>
          <td><label>
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
							else if(isset($_POST["submit"]))
								{
									$sid=$_POST["state"];
									if($x['StateID']==$sid)
										print "<option value='$x[StateID]' selected='selected'>$x[StateName]</option>";
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
          <td><strong>Choose City</strong></td>
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
								if(isset($_POST["submit"]))
								{
									$cid=$_POST["city"];
									if($x['CityID']==$cid)
										print "<option value='$x[CityID]' selected='selected'>$x[CityName]</option>";
									
								}
								else print "<option value='$x[CityID]'>$x[CityName]</option>";
							}
						}
					}
					  
			  ?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" id="submit" value="Search" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr align="center">
          <td colspan="2"> <?php
		  if(isset($_POST["submit"]))
		  {
			
			$city=$_POST["city"];
		  
		require_once("vars.php");
				$conn=mysqli_connect(host,username,pass,database) or die("Error in connection" . mysqli_connect_error());
			$q="select * from addatt where CityID='$city'";
	$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			mysqli_close($conn);
			if($cnt==0)
			{
				print "No records found";
			}
			else
			{
				print "<table width='1336px' cellspacing='0' cellpadding='5'>";
		$count=0;
		while($x=mysqli_fetch_array($res))
		{
			if($count==0)
			{
				print "<tr align='center'>";
			}
			
			print "
			<td>
			<a href='attdetails.php?aid=$x[AttID]'>
				<img src='uploads/$x[AttPic]' height='125' width='275'>
			</a><br/>
			<a href='attdetails.php?aid=$x[AttID]'>$x[AttName]</a><br/>
			</td>";
			$count++;
			if($count==3)
			{
				print "</tr><tr><td>&nbsp;</td></tr>";
				$count=0;
			}
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
    
	include_once("Footer.php");
	
	?></td>
  </tr>
</table>
</body>
</html>