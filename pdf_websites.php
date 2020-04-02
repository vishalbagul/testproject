
<?php
	
	include("config.php");
	//$sql=$_GET['getsql'];
	$sql="SELECT * FROM  `live_websites` ORDER BY `live_websites`.`status`";
    $res=mysql_query($sql) or die(mysql_error());
	
	require_once("dompdf/dompdf_config.inc.php");
	 	
		$html="<html><head><title>NDC-Server Monitor</title><link href=\"style_pdf.css\" rel=\"stylesheet\" type=\"text/css\" /></head><center><body>";
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
		$html.="<div id=\"show_table\">";
		$html.="<h3 align=\"right\">Date/Time : ".date('d-m-y h-i A',strtotime('+270 minute'))."</h3>";
      	$html.='<h2>Live Websites</h2>';
      	$html.="<table width=\"100%\" border=\"1\" style=\"border-style:solid; border-width:thin; border-color:#999999;\">";
        $html.="<tr><td id=\"table_head\">Websites Name</td><td id=\"table_head\">URL</td><td id=\"table_head\">Status</td></tr>";
      $i = 0;
      while (($row=mysql_fetch_array($res)) !== false)
		{
		$i++;
		$html.="<tr class=\"d".($i & 1)."\">";
		$html.="<td id=\"table_data\"><div style=\"height:25px; overflow:hidden;\">".$row['website_name']."</td>";
        $html.="<td id=\"table_data\"><div style=\"height:25px; overflow:hidden;\">".$row['url']."</div></td>";
        
            if(Visit_url($row['url']))
			{	
				$html.="<td id=\"table_data\"><img src=\"images/site_ok.png\" border=\"0\" /></td>";
			}
			else
			{
				$html.="<td id=\"table_data\"><img src=\"images/site_off.png\" border=\"0\" /></td>";
			}
        $html.="</tr>";
	   	}
        $html.="</table></div>";
		$html.="</body></center></html>";
		
		//date_default_timezone_set('IST');
		$filename = "Live_Websites_".date('d-m-y h-i A',strtotime('+330 minute'));
			
		$html=utf8_decode($html);
		$dompdf=new DOMPDF();
		$dompdf->load_html($html);
		ini_set("memory_limit","32M");
		$dompdf->render();
		$dompdf->stream($filename.".pdf");


?>


