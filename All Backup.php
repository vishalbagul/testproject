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
	<div id="header"><img src="images/ndc_banner.png" align="left" /><img src="images/niclogo_small.png" align="right"/></div>    
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
        	<li class="border" id="active_link"><a href="#">All Physical Machines</a></li>
        	<li class="border"><a href="High Traffic PM.php">High-Traffic PM</a></li>
            <li class="border"><a href="Database PM.php">Database PM</a></li>
            <li class="border"><a href="Production PM.php">Production PM</a></li>
            <li class="border"><a href="Staging PM.php">Staging PM</a></li>
            <li class="border"><a href="Colocation PM.php">Co-Location PM</a></li>
            <li class="border"><a href="Other PM.php">Other PM</a></li>
			
        </ul>
		<h3 align="left" style="margin-left:20px;">Backup</h3>
        <ul>
        	<li class="border" id="active_link"><a href="#">All Backup</a></li>
        	<li class="border"><a href="lto4.php">LTO4</a></li>
            <li class="border"><a href="lto5.php">LTO5</a></li>
            <li class="border"><a href="cloud-backup.php">Cloud Backup</a></li>
        </ul>		
        <h3 align="left" style="margin-left:20px;">Hosted Web-Sites</h3> 
        <ul>
        	<li class="border"><a href="Hosted Websites.php">Live Web Sites</a></li>
			<li class="border"><a href="Off Sites Report.php">Off Sites Report</a></li>
			<li class="border"><a href="live website details.php">Public and Local IP</a></li>
        </ul> 
		<h3 align="left" style="margin-left:20px;">IPMI & ILO</h3> 
        <ul>
        	<li class="border"><a href="All IPMI ILO.php">All IPMI / ILO</a></li>
        </ul>
        <div style="background-image:url(images/box-bg.gif); line-height:16px; height:16px;"></div>
      </div> <!-- end left_nav --> 
      <div id="right_main">
      
	        	<h2>Backup</h2>
		<div id="show_table">
      	<table width="100%" style="border-style:solid; border-width:thin; border-color:#999999;">
          <tr>
            <td id="table_head"><a href='?sort=WebsitesName'>Library</a></td>
            <td id="table_head"><a href='?sort=URL'>Backup Name</a></td>
			<td id="table_head"><a href='?sort=PublicIP'>Target</a></td>
            <td id="table_head"><a href='?sort=LocalIP'>Scheduled</a></td>
			<td id="table_head"><a href='?sort=WebsitesName'>Start Time</a></td>
            <td id="table_head"><a href='?sort=URL'>Retention(As Per backup form)</a></td>
			<td id="table_head"><a href='?sort=PublicIP'>Backup IP</a></td>
            <td id="table_head"><a href='?sort=LocalIP'>Machine Name</a></td>
			<td id="table_head"><a href='?sort=WebsitesName'>Machine IP</a></td>
            <td id="table_head"><a href='?sort=URL'>Contact Person</a></td>
			<td id="table_head"><a href='?sort=PublicIP'>Email ID</a></td>
            <td id="table_head"><a href='?sort=LocalIP'>Form Status</a></td>
            <td id="table_head"><a href='?sort=LocalIP'>Remarks</a></td>
          </tr>
      <?php
		$count_up=0;
		$count_down=0;
		$sql3="SELECT * FROM  `backup` ORDER BY `backup`.`library`";
		if($_GET['sort']=="WebsitesName")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`website_name`";
		}
		if($_GET['sort']=="URL")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`url`";
		}
		if($_GET['sort']=="PublicIP")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`public_ip`";
		}
		if($_GET['sort']=="LocalIP")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`local_ip`";
		}
		$res3=mysql_query($sql3) or die(mysql_error());
		  $i = 0;
		  while (($row3=mysql_fetch_array($res3)) !== false)
			{
			$i++;
			print "<tr class=\"d".($i & 1)."\">";
			?>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['library']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['backup-name']; ?></a></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['target']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['scheduled']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['start-time']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['retention']; ?></a></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['backup-ip']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['machine-name']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['machine-ip']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['contact-person']; ?></a></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['email-id']; ?></div></td>
				<td id="table_data"><div style="overflow-x:auto;"><?php echo $row3['form-status']; ?></div></td>
				<td id="table_data"><div style="overflow: hidden;"><?php //echo $row3['remarks']; ?></div></td>				
          </tr>
       <?php 
	   	} 
		?>
        </table>
		</div>
        <br />
	  
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