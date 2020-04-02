
<?php
	
	include("config.php");
		
	//$sql=$_GET['getsql'];
	$sql="SELECT * FROM  `vm` ORDER BY `vm`.`name`";
    $res=mysql_query($sql) or die(mysql_error());
	
	require_once("dompdf/dompdf_config.inc.php");
	 	
		$html="<html><head><title>NDC-Server Monitor</title><link href=\"style_pdf.css\" rel=\"stylesheet\" type=\"text/css\" /></head><center><body>";
		$html.="<div id=\"show_table\">";
		$html.="<h3 align=\"right\">Date/Time : ".date('d-m-y h-i A',strtotime('+330 minute'))."</h3>";
      	$html.='<h2>All Virtual Machines</h2>';
		$html.="<table width=\"100%\" border=\"1\" style=\"border-style:solid; border-width:thin; border-color:#999999;\">";
        $html.="<tr><td id=\"table_head\">Machine Name</td><td id=\"table_head\">IP Address</td><td id=\"table_head\">Clustor</td><td id=\"table_head\">Status</td></tr>";
      $i = 0;
      while (($row=mysql_fetch_array($res)) !== false)
		{
		$i++;
		$html.="<tr class=\"d".($i & 1)."\">";
		$html.="<td id=\"table_data\">".$row['name']."</td>";
        $html.="<td id=\"table_data\">".$row['ip']."</td>";
        $html.="<td id=\"table_data\">".$row['specification']."</td>";
       		if ($row['status'] == "UP")
			{
				$html.="<td id=\"table_data\"><img src=\"images/up.png\" border=\"0\" /></td>";
			}
			else
			{
				$html.="<td id=\"table_data\"><img src=\"images/down.png\" border=\"0\" /></td>";
			}
        $html.="</tr>";
	   	}
        $html.="</table></div>";
		$html.="</body></center></html>";
		
		//date_default_timezone_set('IST');
		$filename = "All_VM_".date('d-m-y h-i A',strtotime('+330 minute'));
				
		$html=utf8_decode($html);
		$dompdf=new DOMPDF();
		$dompdf->load_html($html);
		ini_set("memory_limit","32M");
		$dompdf->render();
		$dompdf->stream($filename.".pdf");


?>


