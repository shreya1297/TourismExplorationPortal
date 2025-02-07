<?php
session_start();
if(!isset($_SESSION["n"])or $_SESSION["utype"]!="admin")
	header("location:error.php");

if(isset($_POST["back"]))
	  		header("location:modifyatt.php");
			
require_once("vars.php");
$aid=$_GET["aid"];
	$con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="select * from addatt where AttID='$aid'";
		
		$res=mysqli_query($con,$query) or die("Error in query 1 execution and error is : ".mysqli_error($con));
		$y=mysqli_fetch_array($res);		
	mysqli_close($con);
	
if(isset($_POST["sub"]))
{
	$cat=$_POST["cat"];
	$subcat=$_POST["subcat"];
	$br=$_POST["brand"];
	$pname=$_POST["pname"];
	$descr=$_POST["descr"];
	$err=$_FILES["ppic"]["error"];
	if($err==0)
	{
		$date=date_create();
		$dt=date_timestamp_get($date);
		$ppic=$dt.$_FILES["ppic"]["name"];
		$filetmp=$_FILES["ppic"]["tmp_name"];			
		move_uploaded_file($filetmp,"uploads/$ppic");
	}
	else
		$ppic=$y['AttPic'];
		
		$err=$_FILES["ppic2"]["error"];
	if($err==0)
	{
		$date=date_create();
		$dt=date_timestamp_get($date);
		$ppic2=$dt.$_FILES["ppic2"]["name"];
		$filetmp=$_FILES["ppic2"]["tmp_name"];			
		move_uploaded_file($filetmp,"uploads/$ppic2");
	}
	else
		$ppic2=$y['AttPic2'];
		
		
	
	
		$con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$descr=mysqli_real_escape_string($con,$descr);
			$pname=mysqli_real_escape_string($con,$pname);
			$ppic=mysqli_real_escape_string($con,$ppic);
			$ppic2=mysqli_real_escape_string($con,$ppic2);
			
		$query="update addatt set StateID='$cat', CityID='$subcat', LocID='$br',AttName='$pname',Description='$descr', AttPic='$ppic',AttPic2='$ppic2' where AttID='$aid'";
		
		$res=mysqli_query($con,$query) or die("Error in query 2 execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==1)
		{
			header("location:modifyatt.php");
		}
		else
		{
			$msg="Attraction couldnot be updated, Please try again";
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
<script type="text/javascript">
/*function xyz()
{
	
	
	if(document.form1.pname.value.length<3)
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
       }*/
</script>
<body>
<table width="1136">
  <tr>
    <td><?php
    	require_once("HeaderAdmin.php");	
	?></td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" >
      <table width="1332" cellpadding="6" cellspacing="0">
        <tr>
          <td width="204" bgcolor="#F4FCC0">&nbsp;</td>
          <td width="920" bgcolor="#F4FCC0"><h1 align="center"><font color="#FF3366">Update Attraction</font></h1></td>
        </tr>
        <tr>
          <td><h4>Choose State</h4></td>
          <td><label for="cat"></label>
            <select name="cat" id="cat">
              <option>Select</option>
<?php
			 		  require_once("vars.php");
			  $con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="select * from addstate ";
		
		$res=mysqli_query($con,$query) or die("Error in query 3 execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==0)
		{
			print "<option>State not available</option> ";
		}
		else
		{
			while($x=mysqli_fetch_array($res))
			{	
				if(isset($_POST["viewsubcat"]))
					{
						$cid=$_POST["cat"];		//getting the value of selected option from the first time the webpage opens.
						if($cid==$x["StateID"])      //for checking the value of CatID ,that the user has selected as category and clicked GO button and from the value of CatID from database
						{
							print "<option value='$x[StateID]' selected='selected'>$x[StateName]</option>";   //for showing the selected value after GO button is clicked.
						}
						else
						{
							print "<option value='$x[StateID]'>$x[StateName]</option>";  // for showing the other category option except the one selected, to admin.
						}
					}
					else
						{
							if($y["StateID"]==$x["StateID"])
								print "<option value='$x[StateID]' selected='selected'>$x[StateName]</option>";	
							else
								print "<option value='$x[StateID]'>$x[StateName]</option>";
						}
			}
		}
			  
			  ?>
            </select>
            <input type="submit" name="viewsubcat" id="viewsubcat" value="GO" /></td>
        </tr>
        <tr>
          <td><h4>Choose City</h4></td>
          <td><label for="subcatname"></label>
            <label for="subcat"></label>
            <select name="subcat" id="subcat">
              <option>Select</option>
<?php
			  require_once("vars.php");
				$cid=$y["StateID"];
			   $con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		if(!isset($_POST["viewsubcat"]))
				$query="select * from addcity where StateID='$cid' ";
		else
			{
				$cid=$_POST["cat"];
				$query="select * from addcity where StateID='$cid' ";
			}
		$res=mysqli_query($con,$query) or die("Error in query 4 execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==0)
		{
			print "<option>City not available</option> ";
		}
		else
		{
			while($z=mysqli_fetch_array($res))
			{
						
							if($y["CityID"]==$z["CityID"])
								print "<option value='$z[CityID]' selected='selected'>$z[CityName]</option>"; 
							else
								print "<option value='$z[CityID]'>$z[CityName]</option>";
						
			}
		}
	 
			  ?>
            </select></td>
        </tr>
        <tr>
          <td><h4>Choose Location Type</h4></td>
          <td><label for="brand"></label>
            <select name="brand" id="brand">
              <option>Select</option>
<?php
			  require_once("vars.php");
			   $con=mysqli_connect(host,username,pass,database) or die("Error in connection establishment and error is due to ".mysqli_connect_error());
		
		$query="select * from addloc ";
		
		$res=mysqli_query($con,$query) or die("Error in query 5 execution and error is : ".mysqli_error($con));
				
		$count=mysqli_affected_rows($con);
		
		if($count==0)
		{
			print "<option>Locations not available</option> ";
		}
		else
		{
			while($x=mysqli_fetch_array($res))
			{
				if($y["LocID"]==$x["LocID"])
					print "<option value='$x[LocID]' selected='selected'>$x[LocName]</option>";	
				else
					print "<option value='$x[LocID]'>$x[LocName]</option>"; 
			}
		}	  
			  ?>
            </select></td>
        </tr>
       
        <tr>
          <td><h4>Attraction Name</h4></td>
          <td><label for="pname"></label>
            <input type="text" name="pname" id="pname" value="<?php print $y['AttName'];?>" /></td>
        </tr>
        <tr>
          <td><h4>Description</h4></td>
          <td><label for="descr"></label>
            <textarea name="descr" cols="40" rows="10" id="descr"><?php  print $y['Description'];?></textarea></td>
        </tr>
        <tr>
          <td><h4>Attraction Picture 1</h4></td>
          <td><p>
            <label for="ppic"></label>
            <?php
			
            print "<img src='uploads/$y[AttPic]' height='80' width='60' >";
			?></p>
            <p>Choose image, if required<br />
              <input type="file" name="ppic" id="ppic" />
            </p></td>
        </tr>
        <tr>
          <td><h4>Attraction Picture 2</h4></td>
          <td><?php
		  
            print "<img src='uploads/$y[AttPic2]' height='80' width='60' >";
			?>
            <br />
            <br />
            Choose image, if required<br />
            <input type="file" name="ppic2" id="ppic2" />
<br /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Update Attraction" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
          if(isset($msg))
		  {
			  print $msg;
		  }
		  ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="back" id="back" value="Back" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><?php
    require_once("Footer.php");
	?></td>
  </tr>
</table>
</body>
</html>