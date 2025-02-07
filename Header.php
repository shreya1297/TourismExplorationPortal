<table width="1336">
  <tr>
    <td width="1292" height="50" align="right" bgcolor="#4691D5"><font color="#FFFFFF">Welcome</font><?php
         if(isset($_SESSION["n"]))
		 	{
				print '<font color="#FFFFFF">&nbsp;';
				print  $_SESSION["n"];
				print "</font>";
				print "  <a href='changepass.php'><font color='#FFFFFF'>&nbsp;Change Password</font></a>";
				print "  <a href='logout.php'><font color='#FFFFFF'>&nbsp;Logout</font></a>";
			}
		else
		{
			print "<font color='#FFFFFF'>&nbsp;Guest</font>";
				print "  <a href='login.php'><font color='#FFFFFF'>&nbsp;Login</font></a>";
				print "  <a href='signup.php'><font color='#FFFFFF'>&nbsp;Signup</font></a>";
			}
	
	?></td>
  </tr>
  <tr>
    <td><link rel="stylesheet" href="ism/css/my-slider.css"/>
<script src="ism/js/ism-2.2.min.js"></script>
<div class="ism-slider" data-transition_type="zoom" data-play_type="loop" data-interval="3000" data-image_fx="zoompan" id="my-slider">
  <ol>
    <li>
      <img src="ism/image/slides/_u/1468593388321_246607.jpg">
    </li>
    <li>
      <img src="ism/image/slides/_u/1468593199256_671499.jpg">
      <div class="ism-caption ism-caption-0">Wildlife Sanctuaries/National Parks</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570854843_714309.jpg">
      <div class="ism-caption ism-caption-0">Hill Stations</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570839223_17646.jpg">
      <div class="ism-caption ism-caption-0">Lakes/Rivers</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570614175_958006.jpeg">
      <div class="ism-caption ism-caption-0">Beaches</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570609671_823976.jpg">
      <div class="ism-caption ism-caption-0">Religious Places</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570609381_848610.jpg">
      <div class="ism-caption ism-caption-0">Waterfalls</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570608800_734435.jpg">
      <div class="ism-caption ism-caption-0">Museums</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570596468_756926.jpg">
      <div class="ism-caption ism-caption-0">Caves</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570585462_832950.jpg">
      <div class="ism-caption ism-caption-0">Historical Monuments</div>
    </li>
  </ol>
</div></td>
  </tr>
  <tr>
    <td height="33">
    <link href="nav.css" rel="stylesheet" type="text/css" />
    <ul id="mynav">
    	<li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="#">States/Union Territories</a>
        	<ul>
            <?php
			require_once("vars.php");

				$conn=mysqli_connect(host,username,pass,database) or die("Error in connection " . mysqli_connect_error());	
				$q="select * from addstate";
				$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
				$cnt=mysqli_affected_rows($conn);
				
					while($a=mysqli_fetch_array($res))
            	print "<li><a href='showcity.php?sid=$a[StateID]'>$a[StateName]</a></li>";
             ?>
            </ul>
        </li>
        <li><a href="#">Search</a>
        	<ul>
            	<li><a href="searchbyloc.php">Attraction(By Location)</a></li>
                <li><a href="searchatt.php">Attraction(By Attraction Name)</a></li>
                <li><a href="searchbycity.php">Attraction(By City)</a></li>
            </ul>
        </li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="contactus.php">Contact</a></li>
    </ul></td>
  </tr>
  <tr>
    <td height="33"><table width="1336" border="0">
      <tr>
        <td width="251">&nbsp;</td>
        <td width="821" align="center">&nbsp;</td>
        <td width="250">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center"><img src="imgs/logo.png" alt="" width="332" height="55" /></td>
        </tr>
    </table></td>
  </tr>
</table>
