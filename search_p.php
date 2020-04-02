<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>NDC-Server Monitor</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {color: #FF0000}
-->
</style>
</head>
<center>
<body>
<div id="wrapper">
	<div id="header"><img src="images/banner.png" align="middle" /></div>    
    <div id="main">
      <div id="nav"><a href="index.php"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="setting.php"><img src="images/setting.png" border="0" /></a>&nbsp;&nbsp;<a href="#"><img src="images/search.png" border="0" /></a></div>
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
        <form name="form" action="search_p.php" methode="get">
        <input type="text" name="search_query"/>
        <input type="submit" name="Submit" value="Search"/>
        </form>
      <?php
			// Get the search variable from URL
			if(!isset($_GET['search_query']))
				die("<h3>Search Query not found</h3>"); 
			$var = $_GET['search_query'];
			$trimmed = trim($var); //trim whitespace from the stored variable
			// check for an empty string and display a message.
			if ($trimmed == "")
			{
				echo "<h3 class=\"style2\">Please enter a search</h3>";
				exit;
			}
			// check for a search parameter
			if (!isset($var))
			{
				echo "<h3>We dont seem to have a search parameter!</h3>";
				exit;
			}
			//Database Connection
			include("config.php");

			// Build SQL Query
			$query = "select * from vm where name like \"%$trimmed%\" or ip like \"%$trimmed%\" or os like \"%$trimmed%\" or specification like \"%$trimmed%\" UNION select * from pm where name like \"%$trimmed%\" or ip like \"%$trimmed%\" or os like \"%$trimmed%\" or specification like \"%$trimmed%\" ";
			
			// EDIT HERE and specify your table and field names for the SQL query
			$numresults=mysql_query($query);
			$numrows=mysql_num_rows($numresults);
			// If we have no results, offer a google search as an alternative ? this is optional
			if ($numrows == 0)
			{
			echo "<h3 class=\"style2\">Sorry, your search: <strong>$trimmed</strong> returned zero results</h3>";
			// google
			
			}
			// next determine if s has been passed to script, if not use ZERO (0) to Limit the output
			if (empty($s)) {
			$s=0;
			}
			// get results
			$result = mysql_query($query) or die("Could not execute query");
			// display what the person searched for
			echo "<h3>You searched for: <strong>$var</strong> </h3>";
			// begin to show results set
			echo "<h2>Results:</h2> <br/>";
			$count = 1 + $s ;
		?>
      	<div id="show_table">
        <table width="100%" style="border-style:solid; border-width:thin; border-color:#999999;">
          <tr>
            <td id="table_head">Machine Name</td>
            <td id="table_head">IP Address</td>
			<td id="table_head">Password</td>
			<td id="table_head">Operating System</td>
            <td id="table_head">Clustor</td>
          </tr>
      <?php
      $i = 0;
      while (($row=mysql_fetch_array($result)) !== false)
		{
		$i++;
		print "<tr class=\"d".($i & 1)."\">";
		?>
            <td id="table_data"><?php echo $row['name']; ?></td>
            <td id="table_data"><?php echo $row['ip']; ?></td>
			<td id="table_data">passwd</td>
			<td id="table_data"><?php echo $row['os']; ?></td>
            <td id="table_data"><?php echo $row['specification']; ?></td>
          </tr>
       <?php 
	   	} 
		?>
        </table>
        </div>
      </div>
    </div>
</div>
<div id="footer"></div>
</body>
</center>
</html>
