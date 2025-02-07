<?php
session_start();
if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
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
<?php
    	require_once("HeaderAdmin.php");	
	?>
<table width="1136" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="1332">
        <tr>
          <td align="center" bgcolor="#F4FCC0"><h1><font color="#FF3366">Modify Location</font></h1></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><?php
	require_once("vars.php");
	
	
		$con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error);
		
		$query="select * from addloc";
		
		$res=mysqli_query($con,$query) or die("Error in query execution and error is : ".mysqli_error);
				
		$count=mysqli_affected_rows($con);
		
		if($count==0)
		{
			print "No records ";
		}
		else
		{
			print "<table align='center' width='1335' cellspacing='0' cellpadding='5'>
						<tr align='left' bgcolor='#6699FF' height='50'>
							<th align='left'>Location Picture</th>
							<th>Location</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>";
						$cnt=1;
			while($x=mysqli_fetch_array($res))
			{
				if($cnt%2==0)
					{
						print "<tr  bgcolor='#99FFFF'>
							<td align='left'><img src='uploads/$x[LocPic]' height='80' width='130'></td>
							<td>$x[LocName]</td>
							<td><a href=updateloc.php?coid=$x[LocID]>Update</a></td>
							<td><a href=deleteloc.php?coid=$x[LocID]>Delete</a></td>
						</tr>";	
					}
				else
				 {
					 print "<tr  bgcolor='#FFFFCC'>
							<td align='left'><img src='uploads/$x[LocPic]' height='80' width='130'></td>
							<td>$x[LocName]</td>
							<td><a href=updateloc.php?coid=$x[LocID]>Update</a></td>
							<td><a href=deleteloc.php?coid=$x[LocID]>Delete</a></td>
						</tr>";	
				 }
				 $cnt++;
			}
			print "</table>";
		}
?></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><?php
    require_once("Footer.PHP");
	?></td>
  </tr>
</table>
</body>
</html>