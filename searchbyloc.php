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
          <td width="365"><h2><strong>Search Attraction</strong> by Location</h2></td>
          <td width="963">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Choose Location Type</strong></td>
          <td><select name="loc" id="loc">
            <option>Select</option>
            <?php
				  require_once("vars.php");
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
				            if($_POST["loc"]!=0)
							{
								$locid=$_POST["loc"];
								if($x['LocID']==$locid)
									print "<option value='$x[LocID]' selected='selected'>$x[LocName]</option>";
								else print "<option value='$x[LocID]'>$x[LocName]</option>";
							}
							else print "<option value='$x[LocID]'>$x[LocName]</option>";
						}
					}
				  mysqli_close($conn);
				  ?>
            </select></td>
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
			
			$loc=$_POST["loc"];
		  
		require_once("vars.php");
				$conn=mysqli_connect(host,username,pass,database) or die("Error in connection" . mysqli_connect_error());
			$q="select * from addatt where LocID='$loc'";
	$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			mysqli_close($conn);
			if($cnt==0)
			{
				print "No records found";
			}
			else
			{
				print "<table width='1336' cellspacing='0' cellpadding='5'>";
				$count=1;
				while($x=mysqli_fetch_array($res))
				{
					if($count==1)
					{
						print "<tr align='center'>";
					}
					print"<td>
					<a href='attdetails.php?aid=$x[AttID]'>
						<img src='uploads/$x[AttPic]' height='125' width='200' border='0'>
					</a><br/>
					<a href='attdetails.php?aid=$x[AttID]'>	
						$x[AttName]</a><br/>
						
					</td>";
					$count++;
					if($count==4)
					{
						print "</tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>";
						$count=1;
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