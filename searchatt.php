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
	if(document.form1.prodname.value.length<3)
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
          <td colspan="2" align="center"><h2><strong>Search Attraction</strong></h2></td>
          </tr>
        <tr>
          <td width="215">&nbsp;</td>
          <td width="752">&nbsp;</td>
        </tr>
        <tr>
          <td><h3>Enter Attraction name </h3></td>
          <td><label for="prodname"></label>
            <input type="text" name="prodname" id="prodname" onkeypress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" id="submit" value="Search" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2" align="center"> <?php
		  if(isset($_POST["submit"]))
		  {
			$pname=$_POST["prodname"];
		  
		require_once("vars.php");
				$conn=mysqli_connect(host,username,pass,database) or die("Error in connection" . mysqli_connect_error());
			$q="select * from addatt where AttName like '%$pname%'";
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