<?php 
header('Refresh:1800'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NDC-Server Monitor</title>
<link rel="shortcut icon" href="images/icon.ico"/>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<center>
<body>
<?php include("config.php"); ?>
<div id="wrapper">
	<div id="header">
	  <div align="left"><img src="images/ndc_banner.png" align="left" /><img src="images/niclogo_small.png" align="right"/></div>
	</div>    
    <div id="main">
      <div id="nav"><a href="index.php"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="setting.php"><img src="images/setting.png" border="0" /></a>&nbsp;&nbsp;<a href="search.php"><img src="images/search.png" border="0" /></a>&nbsp;&nbsp;<a href="document.php"><img src="images/documents.png" border="0" /></a></div>
      <div id="left_nav">
       	<h3 align="left" style="margin-left:20px;">Virtual Machines</h3>
        <ul>
        	<li class="border"><a href="All VM.php">All Virtual Machines</a></li>
        	<li class="border"><a href="High Traffic VM.php">High-Traffic VM</a></li>
            <li class="border"><a href="Database VM.php">Database VM</a></li>
            <li class="border"><a href="Production VM.php">Production VM</a></li>
            <li class="border"><a href="Staging VM.php">Staging VM</a></li>
			<li class="border"><a href="NDCSP Delhi DR.php">NDC SP DELHI DR</a></li>
			<li class="border"><a href="Other VM.php">Other VM</a></li>
        </ul>
        <h3 align="left" style="margin-left:20px;">Physical Machines</h3>
        <ul>
        	<li class="border"><a href="All PM.php">All Physical Machines</a></li>
        	<li class="border"><a href="High Traffic PM.php">High-Traffic PM</a></li>
            <li class="border"><a href="Database PM.php">Database PM</a></li>
            <li class="border"><a href="Production PM.php">Production PM</a></li>
            <li class="border"><a href="Staging PM.php">Staging PM</a></li>
            <li class="border"><a href="Colocation PM.php">Co-Location PM</a></li>
			<li class="border"><a href="Other PM.php">Other PM</a></li>
        </ul> 
        <h3 align="left" style="margin-left:20px;">Hosted Web-Sites</h3> 
        <ul>
        	<li class="border"><a href="Hosted Websites.php">Live Web Sites</a></li>
			<li class="border" id="active_link"><a href="#">Off Sites Report</a></li>
			<li class="border"><a href="live website details.php">Public and Local IP</a></li>
        </ul>  
		<h3 align="left" style="margin-left:20px;">IPMI & ILO</h3> 
        <ul>
        	<li class="border"><a href="All IPMI ILO.php">All IPMI / ILO</a></li>
        </ul>
        <div style="background-image:url(images/box-bg.gif); line-height:16px; height:16px;"></div>
      </div> <!-- end left_nav --> 
      <div id="right_main">
      
      	<div id="show_table">
		<h2>Off-Line Sites Report</h2>
      	<table width="100%" style="border-style:solid; border-width:thin; border-color:#999999;">
          <tr>
            <td id="table_head" width="40%">Website Name</td>
            <td id="table_head" width="20%">Site Off Time</td>
            <td id="table_head" width="20%">Site On Time</td>
            <td id="table_head" width="20%">Total Time</td>
          </tr>
       <?php
		$count_up=0;
		$count_down=0;
		$sql3="SELECT * FROM  `off_sites_report` ORDER BY `off_sites_report`.`start_time` DESC";
		$res3=mysql_query($sql3) or die(mysql_error());
		  $i = 0;
		  while (($row3=mysql_fetch_array($res3)) !== false)
			{
			$i++;
			print "<tr class=\"d".($i & 1)."\">";
			?>
				<td id="table_data"><div style="height:25px; overflow:hidden;"><?php echo $row3['website_name']; ?></div></td>
            	<td id="table_data"><div style="height:25px; overflow:hidden;"><?php echo $row3['start_time']; ?></div></td>
            	<td id="table_data"><div style="height:25px; overflow:hidden;"><?php echo $row3['end_time']; ?></div></td>
            	<td id="table_data"><div style="height:25px; overflow:hidden;"><?php echo $row3['Total_time']; ?></div></td>            	
          </tr>
       <?php 
	   	} 
		?>
        </table>
		</div>
		<br />
        <!--
        <div style="float:left; width:450px; padding:20px;">
        	<a href="#"><img src="images/save as pdf.png" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/save as cvs.png" border="0" /></a>
        </div>
        -->
      </div>
    </div>
</div>
<div id="footer">
<h3>National Data Centre,</h3>
<h3>1st Floor, National Informatics Centre</h3>
<h3>Ganeshkhind Road, Pune - 7,</h3>
<h3>Maharashtra, INDIA</h3>
</div>
</body>
</center>
</html>