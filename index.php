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
<div id="wrapper">
	<div id="header">
	  <div align="left"><img src="images/ndc_banner.png" align="left" /><img src="images/niclogo_small.png" align="right"/></div>
	</div>
    <div id="main">
      <div id="nav"><a href="#"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="setting.php"><img src="images/setting.png" border="0" /></a>&nbsp;&nbsp;<a href="search.php"><img src="images/search.png" border="0" /></a>&nbsp;&nbsp;<a href="document.php"><img src="images/documents.png" border="0" /></a></div>
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
            <li class="border"><a href="Colocation PM.PHP">Co-Location PM</a></li>
			<li class="border"><a href="Other PM.php">Other PM</a></li>
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
    <?php 
	  	//header('Refresh:1800');
		//include("all files.php"); 
	?>
      	<div align="right"><img src="images/NDC logo.png" /></div>
      	<div style="width:30%; float:left; border-right-color:#999999; border-right-style:solid; border-right-width:thin;">
        	<a href="All VM.php" title="All Virtual Machines"><img src="images/Virtual_pc_icon.png" border="0" align="middle" /></a>
        <!--    <h3 style="color:#00CC00;">Up Virtual Machine = <?php //echo $count_up_vm; ?></h3>
        	<h3 style="color:#FF0000;">Down Virtual Machine = <?php //echo $count_down_vm; ?></h3> -->
        </div>
        <div style="width:30%; float:left;">
            <a href="All PM.php" title="All Physical Machines"><img src="images/Physical_pc_icon.png" border="0" align="middle" /></a>
       	 <!-- 	<h3 style="color:#00CC00;">Up Physical Machine = <?php //echo $count_up_pm; ?></h3>
            <h3 style="color:#FF0000;">Down Physical Machine = <?php //echo $count_down_pm; ?></h3> -->
        </div>
        <div style="width:30%; float:left; border-left-color:#999999; border-left-style:solid; border-left-width:thin;">
        	<a href="Hosted Websites.php" title="Live Websites"><img src="images/Live_web_icon.png" border="0" align="middle" /></a>
        <!--    <h3 style="color:#00CC00;">On-Line Websites = <?php //echo $count_up_site; ?></h3>
            <h3 style="color:#FF0000;">Off-Line Websites = <?php //echo $count_down_site; ?></h3> -->
       	</div>
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
