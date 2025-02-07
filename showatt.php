<?php
session_start();
if(!isset($_SESSION["n"])and $_SESSION["utype"]!="admin")
	header("location:error.php");


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
              <td colspan="2"><h2>
                <?php
require_once("vars.php");
	$cid=$_GET["cid"];
	$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
	$q="select * from addatt where cityid='$cid'";
	$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	if($cnt==0)
	{
		print "No attractions available";
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
			
			print "
			<td>
			<a href='attdetails.php?aid=$x[AttID]'>
				<img src='uploads/$x[AttPic]' height='125' width='275'>
			</a><br/>
			<a href='attdetails.php?aid=$x[AttID]'>$x[AttName]</a><br/>
			</td>";
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