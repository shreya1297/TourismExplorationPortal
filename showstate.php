<?php
session_start();
/*if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
	header("location:error.php");*/
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
        <td valign="top"><form id="form1" name="form1" method="post" action=""><?php
require_once("vars.php");

	$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
	$q="select * from addstate";
	$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	if($cnt==0)
	{
		$msg = "No states available";
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
			<a href='showcity.php?sid=$x[StateID]'>
				<img src='uploads/$x[StatePic]' height='125'>
			</a><br/>
			<a href='showcity.php?sid=$x[StateID]'>$x[StateName]</a>
			</td>";
			$count++;
			if($count==3)
			{
				print "</tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>";
				$count=0;
			}
		}
		print "</table>";
	}
?>
          <table width="1342" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td width="1339" colspan="2"><h2>
                
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