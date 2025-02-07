<?php
    session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<body>
<table width="975" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php
    
	require_once("Header.php");
	
	?></td>
  </tr>
  <tr>
    <td><table width="975" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><form id="form1" name="form1" method="post" action="">
          <table width="1336" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td width="1328" colspan="2"><h2>
                <?php
require_once("vars.php");
	$sid=$_GET["sid"];
	$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
	$q="select * from addcity where stateid='$sid'";
	$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	if($cnt==0)
	{
		print "No cities available";
	}
	else
	{
		print "<table width='1336px' align='center' cellspacing='0'>";
		$count=0;
		while($x=mysqli_fetch_array($res))
		{
			if($count==0)
			{
				print "<tr align='center'>";
			}
			
			
			if(!isset($_SESSION['n']))
			{
			print "
			<td>	
			<a href='login.php?cid=$x[CityID]'>
				<img src='uploads/$x[CityPic]' height='125' width='275'>
			</a><br/>
			<a href='login.php?cid=$x[CityID]'>$x[CityName]</a>
			</td>";
			}
			else {
					print "
			<td>	
			<a href='showatt.php?cid=$x[CityID]'>
				<img src='uploads/$x[CityPic]' height='125'  width='275'>
			</a><br/>
			<a href='showatt.php?cid=$x[CityID]'>$x[CityName]</a>
		
			</td>";
			}
			$count++;
			if($count==2)
			{
				print "</tr><tr><td>&nbsp;</td></tr>";
				$count=0;
			}
		}
		print "</table>";
	}
?>
              </h2></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            </table>
        </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php
    
	require_once("Footer.php");
	
	?></td>
  </tr>
</table>
</body>
</html>