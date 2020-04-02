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
<?php header('Refresh:1800'); ?>
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
            <li class="border" id="active_link"><a href="#">Staging PM</a></li>
            <li class="border"><a href="Colocation PM.php">Co-Location PM</a></li>
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
	  	$count_up=0;
		$count_down=0;
		$sql="SELECT * FROM  `pm` WHERE `specification`='Staging' ORDER BY `pm`.`name`";
		if($_GET['sort']=="MachineName")
		{
			$sql="SELECT * FROM  `pm` WHERE `specification`='Staging' ORDER BY `pm`.`name`";
		}
		if($_GET['sort']=="IPAddress")
		{
			$sql="SELECT * FROM  `pm` WHERE `specification`='Staging' ORDER BY `pm`.`ip`";
		}
		if($_GET['sort']=="Clustor")
		{
			$sql="SELECT * FROM  `pm` WHERE `specification`='Staging' ORDER BY `pm`.`specification`";
		}
		if($_GET['sort']=="Status")
		{
			$sql="SELECT * FROM  `pm` WHERE `specification`='Staging' ORDER BY `pm`.`status`";
		}
		$res=mysql_query($sql) or die(mysql_error());
	  ?>
      	<div id="show_table">
        <h2>Staging Physical Machines</h2>
      	<table width="100%" style="border-style:solid; border-width:thin; border-color:#999999;">
          <tr>
            <td id="table_head"><a href='?sort=MachineName'>Machine Name</a></td>
            <td id="table_head"><a href='?sort=IPAddress'>IP Address</a></td>
            <td id="table_head"><a href='?sort=Clustor'>Cluster</a></td>
            <td id="table_head"><a href='?sort=Status'>Status</a></td>
          </tr>
      <?php
      $i = 0;
      while (($row=mysql_fetch_array($res)) !== false)
		{
		$i++;
		print "<tr class=\"d".($i & 1)."\">";
		?>
            <td id="table_data"><?php echo $row['name']; ?></td>
            <td id="table_data"><?php echo $row['ip']; ?></td>
            <td id="table_data"><?php echo $row['specification']; ?></td>
            <?php
            $ipadd670="ping -n 1 -w 1 ".$row['ip'];

			$str = exec($ipadd670, $input, $status);
			if ($status == 0)
			{
				echo "<td id=\"table_data\"><img src=\"images/up.png\" border=\"0\" /></td>";
				$count_up++;
			}
			else
			{
				echo "<td id=\"table_data\"><img src=\"images/down.png\" border=\"0\" /></td>";
				$count_down++;
			}
			?>
          </tr>
       <?php 
	   	} 
		?>
        </table>
        </div>
        <h3 align="left">Report :</h3>
        <h3 align="left" style="color:#00CC00; padding-left:50px;">Up Physical Machine = <?php echo $count_up; ?></h3>
        <h3 align="left" style="color:#FF0000; padding-left:50px;">Down Physical Machine = <?php echo $count_down; ?></h3>
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
