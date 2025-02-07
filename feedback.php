<?php
    session_start();
	require_once("vars.php");
    if(isset($_POST["sub"]))
	{
		$nm=$_POST["name"];
		$phno=$_POST["phone"];
		$username=$_POST["username"];
		$ques1=$_POST["ques1"];
		$ques2=$_POST["ques2"];
		$ques3=$_POST["ques3"];
		$ques4=$_POST["ques4"];
		$suggestion=$_POST["message"];
		date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d H:i:s");
		
			$conn=mysqli_connect(host,username,pass,database) or die("Error in connection".mysqli_connect_error);
            $q="insert into feedback(Name,PhoneNo,Username,Ques1,Ques2,Ques3,Ques4,Suggestion,Date) values('$nm','$phno','$username','$ques1','$ques2','$ques3','$ques4','$suggestion','$date')";
			
			mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			
			if($cnt==1)
			{
				$msg="Thanks for Giving your Feedback";
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
function xyz()
{
	if(document.form1.name.value.length<4)
	{
		alert("please fill your name");
		return false;
	}
		if(document.form1.phone.value.length!=10)
	{
		alert("phone number should be of 10 digits");
		return false;
	}
		if(document.form1.username.value.length<1||document.form1.username.value.indexOf("@")<3||document.form1.username.value.indexOf(".")<4)
	{
		alert("please fill proper username/email id");
		return false;
	}

	if(document.form1.ques1[0].checked==false&&document.form1.ques1[1].checked==false&&document.form1.ques1[2].checked==false&&document.form1.ques1[3].checked==false&&document.form1.ques1[4].checked==false)
	{
		alert("Please fill Ques 1");
		return false;
	}
	if(document.form1.ques2[0].checked==false&&document.form1.ques2[1].checked==false)
	{
		alert("Please fill Ques 2");
		return false;
	}
	if(document.form1.ques3[0].checked==false&&document.form1.ques3[1].checked==false&&document.form1.ques3[2].checked==false&&document.form1.ques3[3].checked==false&&document.form1.ques3[4].checked==false)
	{
		alert("Please fill Ques 3");
		return false;
	}
	if(document.form1.ques4[0].checked==false&&document.form1.ques4[1].checked==false)
	{
		alert("Please fill Ques 4");
		return false;
	}
}
function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode != 46 && charCode > 31) 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	   function isNumberKey1(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode != 46 && charCode > 31) 
            && (charCode < 48 || charCode > 57))
             return true;

          return false;
       }
	   </script>
<body>
<table width="1336" border="0">
  <tr>
    <td><?php
    		require_once("Header.php");
			?>
    </td>
  </tr>
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return xyz()" >
      <table width="1336" border="0">
        <tr>
          <td align="center"><h2><font color="#FF3366">Feedback</font></h2></td>
        </tr>
      </table>
    
      <table width="1336" border="0" cellpadding="5">
        <tr>
          <td width="337"><strong>Name</strong></td>
          <td width="989"><strong>
          <input type="text" name="name" id="name" onkeypress="return isNumberKey1(event)"/>
          </strong></td>
        </tr>
        <tr>
          <td><strong>Phone No</strong></td>
          <td><strong>
            <input type="text" name="phone" id="phone" onkeypress="return isNumberKey(event)"/>
          </strong></td>
        </tr>
        <tr>
          <td><strong>Username(Email Id)</strong></td>
          <td><strong>
            <input type="text" name="username" id="username" />
          </strong></td>
        </tr>
        <tr>
          <td><strong>How you rate our Website?</strong></td>
          <td><p>
            <strong>
            <label>
              <input type="radio" name="ques1" value="Excellent" id="ques1_0" />
              Excellent</label>
            <label>
              <input type="radio" name="ques1" value="Very Good" id="ques1_1" />
              Very Good </label>

            <label>
              <input type="radio" name="ques1" value="Good" id="ques1_2" />
              Good</label>
           
            <label>
              <input type="radio" name="ques1" value="Average" id="ques1_3" />
              Average</label>
  
            <label>
              <input type="radio" name="ques1" value="Bad" id="ques1_4" />
              Bad</label>
            <br />
            </strong></p></td>
        </tr>
        <tr>
          <td><strong>Are you satisfied with the  Information provided ?</strong></td>
          <td><p>
            <strong>
            <label>
              <input type="radio" name="ques2" value="Yes" id="ques2_0" />
              Yes</label>
            
            <label>
              <input type="radio" name="ques2" value="No" id="ques2_1" />
              No</label>
            <br />
            </strong></p></td>
        </tr>
        <tr>
          <td><strong>How would you rate designing of the Website?</strong></td>
          <td><p>
            <strong>
            <label>
              <input type="radio" name="ques3" value="Excellent" id="ques1_0" />
              Excellent</label>
            <label>
              <input type="radio" name="ques3" value="Very Good" id="ques1_1" />
              Very Good </label>

            <label>
              <input type="radio" name="ques3" value="Good" id="ques1_2" />
              Good</label>
           
            <label>
              <input type="radio" name="ques3" value="Average" id="ques1_3" />
              Average</label>
  
            <label>
              <input type="radio" name="ques3" value="Bad" id="ques1_4" />
              Bad</label>
            <br />
            </strong></p></td>
        </tr>
        <tr>
          <td><strong>Were you inspired to visit any location?</strong></td>
          <td><p>
            <label>
              <strong>
              <input type="radio" name="ques4" value="Yes" id="ques4_0" />
              Yes</strong></label>
            <strong>
            <label>
              <input type="radio" name="ques4" value="No" id="ques4_1" />
              No</label>
            </strong><strong><br />
            </strong></p></td>
          </tr>
        <tr>
          <td><strong>Any Other Suggesstions</strong></td>
          <td><strong>
            <label>
              <textarea name="message" cols="30" rows="10" id="message"></textarea>
            </label>
          </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="sub" id="sub" value="Submit" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
          		if(isset($msg))  print $msg;
				?>
           </td>
        </tr>
      </table>
    </form></td>
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