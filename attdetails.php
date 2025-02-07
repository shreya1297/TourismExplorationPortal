<?php
session_start();
if(!isset($_SESSION["n"])and $_SESSION["utype"]!="admin")
	header("location:error.php");
require_once("vars.php");
	$aid=$_GET["aid"];
	$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
	$q="select addatt.AttID, addatt.AttName,addatt.Description, addatt.AttPic,addatt.AttPic2, addstate.StateName, addcity.CityName, addloc.LocName from addatt,addstate,addcity,addloc where addatt.AttID='$aid' and addatt.StateID=addstate.StateID and addatt.CityID=addcity.CityID and addatt.LocID=addloc.LocID";
	$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	if($cnt==0)
	{
		print "No details available";
	}
	else
	{
		$x=mysqli_fetch_array($res);
		
	}
	if(isset($_POST["postcomm"]))
	{
			$comm=$_POST["comm"];
			$un=$_SESSION["n"];
			$upic=$_SESSION["ppic"];
			$attname=$x["AttName"];
			$err=$_FILES["ExpPic"]["error"];
		if($err==0)
		{
			$date=date_create();
			$tstamp=date_timestamp_get($date);
			$exppic=$tstamp.$_FILES["ExpPic"]["name"];
			$ftype=$_FILES["ExpPic"]["type"];
			$fsize=($_FILES["ExpPic"]["size"])/1024;
			$ftmpnm=$_FILES["ExpPic"]["tmp_name"];
			  
				move_uploaded_file($ftmpnm,"uploads/$fn");
		}
		
		else  $exppic="no_image.png";
		
		date_default_timezone_set("Asia/Kolkata");
		$date1=date("Y-m-d H:i:s");
			
			
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
			$q="insert into comment(AttID,AttName,Comment,ExpPic,CommentBy,UserPic,Date) value('$aid','$attname','$comm','$exppic','$un','$upic','$date1')";
			$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			if($cnt==1)
			{
				$msg= "Experience Posted Successfully";
			}
			else
			{
				$msg= "Error while posting Experience, Please try Again";
				
			}
}
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
        <td valign="top"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="1336" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td colspan="2"><h2>Attraction Details
                
              </h2></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><table width="1336" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="246" rowspan="6" align="center">
				  <?php print "<img src='uploads/$x[AttPic]' width='450' height='300'>"; ?></td>
                  <td width="188"><h3><strong>Name</strong></h3></td>
                  <td width="466"><?php print "<font size='4'>$x[AttName]</font>" ; ?></td>
                </tr>
                <tr>
                  <td><h3><strong>Location Type</strong></h3></td>
                  <td><?php print "<font size='4'>$x[LocName]</font>"; ?></td>
                </tr>
                <tr>
                  <td><h3><strong>State</strong></h3></td>
                  <td><?php print "<font size='4'>$x[StateName]</font>"; ?></td>
                </tr>
                <tr>
                  <td><h3><strong>City</strong></h3></td>
                  <td><?php print "<font size='4'>$x[CityName]</font>"; ?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><table width="1336" border="0">
                <tr align="center">
                  <td width="195"><h3><strong>Description</strong></h3></td>
                  <td width="732" align="left"><?php print "<font size='4'>$x[Description]</font>"; ?></td>
                  <td width="387" align="center"><?php print "<img src='uploads/$x[AttPic2]' width='275' height='175'>"; ?></td>
                </tr>
                <tr align="center">
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr align="center">
                  <td colspan="3" align="left"><h2>Post your Experiences(About your Visit) :</h2></td>
                </tr>
                <tr align="center">
                  <td colspan="3" align="left">&nbsp;</td>
                </tr>
                <tr align="center">
                  <td colspan="3" align="left"><p>
                    <label for="comm"></label>
                    <textarea name="comm" cols="45" rows="12" id="comm"></textarea>
                  </p>
                    <p><strong>Add your Visit Picture</strong></p>
                    <p>
                      <label for="ExpPic"></label>
                      <input type="file" name="ExpPic" id="ExpPic" />
                    </p>
                    <p>
                      <input type="submit" name="postcomm" id="postcomm" value="Add Experience" />
                    </p>
                  </td>
                </tr>
                <tr align="center">
                  <td colspan="3" align="left"><?php
                  if(isset($msg))
				  		print $msg;
					?>
                </tr>
                <tr align="center">
                  <td colspan="3" align="left"><h3>Shared Experiences :</h3>
                    <p>&nbsp;</p></td>
                </tr>
                <tr align="center">
                  <td colspan="3" align="left"><?php
							$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
			$q="select * from comment where AttID='$aid' order by Date desc";
			$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			if($cnt==0)
			{
				print "No User Experience available for this Attraction";
			}
			else
			{	
				print "$cnt Experiences available for this Attraction";
				print "<table align='left' width='1336'>";
				while($y=mysqli_fetch_array($res))
				{
					print "<tr>
								<td>
								<img src='uploads/$y[UserPic]' height='70' width='70'><br/>
								<font color='blue'>$y[CommentBy]</font>
								</td>
								<td>$y[Comment]<br/><font color='blue'>$y[Date]</font></td>
								<td>
								<img src='uploads/$y[ExpPic]' height='125' width='125'>
								</td>
							</tr>
							<tr></tr>";
				}
				print "</table>";
			}
						  
				  
				  ?></td>
                </tr>
                </table></td>
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