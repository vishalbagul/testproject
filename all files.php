<?php 
	header('Refresh:1800');
	include("config.php");

	//Virtual Machines
	  	$count_up_vm=0;
		$count_down_vm=0;
	  	$sql="SELECT * FROM  `vm`";
		$res=mysql_query($sql) or die(mysql_error());		
      while ($row=mysql_fetch_array($res))
		{
		  $ipadd670="ping -n 1 -w 1 ".$row['ip'];

			$str = exec($ipadd670, $input, $status);
			if ($status == 0)
			{
				$count_up_vm++;
			}
			else
			{
				$count_down_vm++;
			}
	   	}
	
	//Physical Machines
		$count_up_pm=0;
		$count_down_pm=0;
	  	$sql="SELECT * FROM  `pm`";
		$res=mysql_query($sql) or die(mysql_error());
		
      while ($row=mysql_fetch_array($res))
		{
		  $ipadd670="ping -n 1 -w 1 ".$row['ip'];

			$str = exec($ipadd670, $input, $status);
			if ($status == 0)
			{
				$count_up_pm++;
			}
			else
			{
				$count_down_pm++;
			}
	   	}
		
	//Hosted Websites
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
		
		$count_up_site=0;
		$count_down_site=0;
		$sql="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`website_name`";
		$res=mysql_query($sql) or die(mysql_error());
		while (($row=mysql_fetch_array($res)) !== false)
		{
			$url=$row['url'];
				
			if(Visit_url($row['url']))
			{
				
				$count_up_site++;
			}
			else
			{
				$count_down_site++;
			}
		}
		
?>