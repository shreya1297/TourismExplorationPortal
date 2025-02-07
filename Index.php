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

<body>
<table width="1336" border="0">
  <tr>
    <td><?php
    		require_once("Header.php");
			?>
    </td>
  </tr>
  <tr>
    <td><table width="1339" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1127" height="190" align="center"><h3>Welcome Everyone.Enjoy to see the beauty of INDIA.</h3>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>
            <?php
          require_once("vars.php");

	$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
	$q="select * from addstate order by rand() limit 12";
	$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	if($cnt==0)
	{
		print "No states available";
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
				<img src='uploads/$x[StatePic]' height='125' width='175'>
			</a><br/>
			<a href='showcity.php?sid=$x[StateID]'>$x[StateName]</a>
			</td>";
			$count++;
			if($count==4)
			{
				print "</tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>";
				$count=0;
			}
		}
		print "</table>";
		print "<h4>For more <a href='showstate.php'>Click </a>here</h4>";
	}	  
		  ?>
          </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
        <td width="212">&nbsp;</td>
      </tr>
    </table></td>
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