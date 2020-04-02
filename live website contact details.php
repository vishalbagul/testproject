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
      <div id="right_main" style="width:100%;" >
      	
      <?php
		$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`public_ip`";
		if($_GET['sort']=="WebsitesName")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`website_name`";
		}
		if($_GET['sort']=="URL")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`url`";
		}
		if($_GET['sort']=="hod")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`hod`";
		}
		if($_GET['sort']=="contact")
		{
			$sql3="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`contact`";
		}
		?>
		<h2>Live Websites Contact Details</h2>
		<div id="show_table">
      	<table width="96%" align="center" style="border-style:solid; border-width:thin; border-color:#999999;">
          <tr>
            <td id="table_head" rowspan="2"><a href='?sort=WebsitesName'>Websites Name</a></td>
            <td id="table_head" rowspan="2"><a href='?sort=URL'>URL</a></td>
			<td id="table_head" colspan="2"><a href='?sort=hod'>HOD</a></td>
            <td id="table_head" colspan="2"><a href='?sort=contact'>Contact Person</a></td>
          </tr>
		  <tr>
            <td id="table_head"><a href='?sort=hod'>Name</a></td>
            <td id="table_head"><a href='?sort=hod'>Mail ID</a></td>
            <td id="table_head"><a href='?sort=contact'>Name</a></td>
			<td id="table_head"><a href='?sort=contact'>Mail ID</a></td>
          </tr>

		<?php  
		$res3=mysql_query($sql3) or die(mysql_error());
		  $i = 0;
		  while (($row3=mysql_fetch_array($res3)) !== false)
			{
			$i++;
			print "<tr class=\"d".($i & 1)."\">";
			?>
				<td id="table_data" width="15%"><div style="height:25px; overflow:hidden;"><?php echo $row3['website_name']; ?></div></td>
				<td id="table_data" width="15%"><div style="height:25px; overflow:hidden;"><a href="<?php echo $row3['url']; ?>"><?php echo $row3['url']; ?></a></div></td>
				<td id="table_data" width="15%"><div style="height:25px; overflow:hidden;"><?php echo $row3['hod'];  ?></div></td>
				<td id="table_data" width="20%"><div style="height:25px; overflow:hidden;"><?php echo $row3['hod_email']; ?></div></td>
				<td id="table_data" width="15%"><div style="height:25px; overflow:hidden;"><?php echo $row3['contact']; ?></div></td>
				<td id="table_data" width="20%"><div style="height:25px; overflow:hidden;"><?php echo $row3['contact_email']; ?></div></td>
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