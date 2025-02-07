<table width="1336" border="0">
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
    <td>
    <link rel="stylesheet" href="ism/css/my-slider.css"/>
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
    	<li><a href="adminpanel.php">Home</a></li>
        <li><a href="#">Add</a>
        	<ul>
            	<li><a href="addstate.php">State/Union Territory</a></li>
                <li><a href="addcity.php">City</a></li>
                <li><a href="addloc.php">Location</a></li>
                <li><a href="addatt.php">Attraction</a></li>
                <li><a href="addadmin.php">Admin</a></li>
            </ul>
        </li>
        <li><a href="searchuser.php">Search User</a>
        </li>
        <li><a href="#">View</a>
        	<ul>
            	<li><a href="listofuser.php">List of all Users</a></li>
                <li><a href="modifycontact.php">Messages</a></li>
                <li><a href="viewfeedback.php">Feedback</a></li>
            </ul>
        </li>
           <li><a href="#">Modify</a>
        	<ul>
            	<li><a href="modifystate.php">State/Union Territory</a></li>
                <li><a href="modifycity.php">City</a></li>
                <li><a href="modifyloc.php">Location</a></li>
                <li><a href="modifyatt.php">Attraction</a></li>
            </ul>
        </li>
         <li><a href="#">More</a>
             <ul>
                    <li><a href="searchatt.php">Search Attraction(Name)</a></li>
                    <li><a href="searchbyloc.php">Search Attraction(Location) </a></li>
                    <li><a href="searchbycity.php">Search Attraction(City)</a></li>
                </ul>
       </li>
    </ul>
 </td> 
  </tr>
</table>
