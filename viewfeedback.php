<?php
	session_start();
	if(!isset($_SESSION["n"] )or $_SESSION["utype"]!="admin")
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

<body>
<table width="1336" border="0">
  <tr>
    <td><?php
    		require_once("HeaderAdmin.php");
			?>
    </td>
  </tr>
  <tr>
    <td><table width="1336" border="0">
        <tr>
          <td height="83" align="center"><h2>View Feedback</h2></td>
        </tr>
        <tr>
          <td align="center"><form id="form1" name="form1" method="post" action="">
            <input type="submit" name="back" id="back" value="Back" />
          </form></td>
        </tr>
        <tr>
          <td align="left"><?php
                 require_once("vars.php");
 
	        $conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="select * from feedback order by Date desc";
          
			
			$res=mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==0)
			{
				$msg="No records found";
			}
			else 
			{
				print "<table align='center' width='1336px' cellspacing='0' cellpadding='7'>
						<tr bgcolor='#ffcce6' height='70' align='left'>
							<th>Name</th>
							<th>Phone No.</th>
							<th>Username/email</th>
							<th>Website </th>
							<th>Content of Website</th>
							<th>Website Design </th>
							<th>Inspired </th>
							<th>Suggestion</th>
						</tr>";
						$c=1;
						while($x=mysqli_fetch_array($res))
						{
							if(($c%2)==0) 
							{
								print "<tr bgcolor=' #ccddff'>
										<td>$x[Name]</td>
										<td>$x[PhoneNo]</td>
										<td>$x[Username]</td>
										<td>$x[Ques1]</td>
										<td>$x[Ques2]</td>
										<td>$x[Ques3]</td>
										<td>$x[Ques4]</td>
										<td>$x[Suggestion]</td>										
										
									</tr>";
							}
							else
									{
								print "<tr bgcolor='#ffffe6'>
										<td>$x[Name]</td>
										<td>$x[PhoneNo]</td>
										<td>$x[Username]</td>
										<td>$x[Ques1]</td>
										<td>$x[Ques2]</td>
										<td>$x[Ques3]</td>
										<td>$x[Ques4]</td>
										<td>$x[Suggestion]</td>			
										
									</tr>";
							}
							 $c++;
					}	//end of while
						print "</table>";
						
	
	}
?></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
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