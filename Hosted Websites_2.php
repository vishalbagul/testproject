<?php 
header('Refresh:900'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NDC-Server Monitor</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<center>
<body>
<?php include("config.php"); ?>
<div id="wrapper">
	<div id="header"><img src="images/banner.png" align="middle" /></div>    
    <div id="main">
      <div id="nav"><a href="index.php"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="setting.php"><img src="images/setting.png" border="0" /></a>&nbsp;&nbsp;<a href="search.php"><img src="images/search.png" border="0" /></a></div>
      <div id="left_nav">
       	<h3 align="left" style="margin-left:20px;">Virtual Machines</h3>
        <ul>
        	<li class="border"><a href="All VM.php">All Virtual Machines</a></li>
        	<li class="border"><a href="High Traffic VM.php">High-Traffic VM</a></li>
            <li class="border"><a href="Database VM.php">Database VM</a></li>
            <li class="border"><a href="Production VM.php">Production VM</a></li>
            <li class="border"><a href="Staging VM.php">Staging VM</a></li>
			<li class="border"><a href="Colocation VM.php">Co-Location VM</a></li>
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
        	<li class="border" id="active_link"><a href="#">Live Web Sites</a></li>
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
	  	function Visit_url($url)
		{
			$agent="Mozilla/4.0 (comatible; MSIE 5.01; Windows NT 5.0)";
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_VERBOSE, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			$page=curl_exec($ch);
			$httpcode=curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			if($httpcode>=200 && $httpcode<300) return true;
			else return false;
		}
		$sql="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`website_name`";
		$res=mysql_query($sql) or die(mysql_error());
		while (($row=mysql_fetch_array($res)) !== false)
		{
			$url=$row['url'];
			$site_name=$row['website_name'];
			$status=$row['status'];
			//$set_time=date('d-m-y h-i A',strtotime('+330 minute'));
			$set_time= date('Y:m:d H:i',strtotime('+330 minute'));
			$temp_off="Currently Off-Line";
			if(Visit_url($row['url']))
			{
				//----- For off site Report
				if($status =="Off-Line")
				{
					$sql_report="UPDATE  `ndc_db`.`off_sites_report` SET  `end_time` =  '$set_time' WHERE  `off_sites_report`.`website_name` =  '$site_name' AND `off_sites_report`.`end_time` =  '$temp_off'";
					$result_report=mysql_query($sql_report);
					//----Count Total Time
						
					//--------------------
				}
				//----- For off site Report End
				
				$sql2="UPDATE  `ndc_db`.`live_websites` SET  `status` =  'On-Line' WHERE  `live_websites`.`url` =  '$url'";
				$result2=mysql_query($sql2);
			}
			else
			{
				//----- For off site Report
				if($status =="On-Line")
				{					
					$sql_report="INSERT INTO `ndc_db`.`off_sites_report` (`website_name` ,`start_time` ,`end_time` ,`total_time`) VALUES ('$site_name',  '$set_time',  '$temp_off',  '');";
					mysql_query($sql_report);
				}
				//----- For off site Report End
				
				$sql2="UPDATE  `ndc_db`.`live_websites` SET `status` =  'Off-Line' WHERE  `live_websites`.`url` =  '$url'";
				$result2=mysql_query($sql2);
			}
		}
	  ?>
      	<div id="show_table">
		<h2>Live Websites</h2>
      	<table width="100%" style="border-style:solid; border-width:thin; border-color:#999999;">
          <tr>
            <td id="table_head" width="30%"><a href='?sort=Websites_Name'>Websites Name</td>
            <td id="table_head" width="50%"><a href='?sort=URL'>URL</td>
            <td id="table_head" width="20%"><a href='?sort=Status'>Status</td>
          </tr>
       <?php
		$count_up=0;
		$count_down=0;
		$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`website_name`";
		if($_GET['sort']=="Websites_Name")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`website_name`";
		}
		if($_GET['sort']=="URL")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`url`";
		}
		if($_GET['sort']=="Status")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`status`";
		}
		$res3=mysql_query($sql3) or die(mysql_error());
		  $i = 0;
		  while (($row3=mysql_fetch_array($res3)) !== false)
			{
			$i++;
			print "<tr class=\"d".($i & 1)."\">";
			?>
				<td id="table_data"><div style="height:25px; overflow:hidden;"><?php echo $row3['website_name']; ?></div></td>
            	<td id="table_data"><div style="width:500px; height:25px; overflow:hidden;"><a href="<?php echo $row3['url']; ?>" target="_blank" title="<?php print $row3['url']. "\n"; print "Public IP-" .$row3['public_ip']. "\n"; print "Local IP-" .$row3['local_ip'];  ?>"><?php echo $row3['url']; ?></a></div></td>
				<?php
				if ($row3['status'] == "On-Line")
				{
					echo "<td id=\"table_data\"><img src=\"images/site_ok.png\" border=\"0\" /></td>";
					$count_up++;
				}
				else
				{
					echo "<td id=\"table_data\"><img src=\"images/site_off.png\" border=\"0\" /></td>";
					$count_down++;
				}
			?>
          </tr>
       <?php 
	   	} 
		?>
        </table>
		</div>
		<br />
        
        <div style="float:left; width:400px;">
            <div style="height:100px; width:auto; float:left; margin:10px;">
                <img src="images/report.png" border="0" style="float:left;" />
            </div>
            <h3 align="left" style="font-weight:bold;">Report :</h3>
            <h3 align="left" style="color:#00CC00; padding-left:50px;">On-Line Websites = <?php echo $count_up; ?></h3>
            <h3 align="left" style="color:#FF0000; padding-left:50px;">Off-Line Websites = <?php echo $count_down; ?></h3>
        </div>
        <div style="float:left; width:450px; padding:20px;">
        	<a href="pdf_websites.php"><img src="images/save as pdf.png" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/save as cvs.png" border="0" /></a>
        </div>
      </div>
    </div>
</div>
<div id="footer"></div>
</body>
</center>
</html>