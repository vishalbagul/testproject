<?php 
	include('config.php');
	if (isset($_POST['btnadd']))
                        {
                                    $m_type=$_POST['slttype'];
                                    $m_speci=$_POST['sltspeci'];
                                    $m_name=$_POST['txtname'];
                                    $m_ip=$_POST['txtip'];
									$m_os=$_POST['sltos'];
									
									$vm_type="Virtual Machine";
									$pm_type="Physical Machine";
                                    
									// Insert data into database 
                                    if($m_type == $vm_type)
                                    {
										$sql="INSERT INTO `ndc_db`.`vm` (`specification`, `name`, `ip`, `os`) VALUES ('$m_speci','$m_name', '$m_ip', '$m_os');";
                                    }
									elseif($m_type==$pm_type)
									{
										$sql="INSERT INTO `ndc_db`.`pm` (`specification`, `name`, `ip`, `os`) VALUES ('$m_speci','$m_name', '$m_ip', '$m_os');";
									}
									
                                    $result=mysql_query($sql);
                                    
                                    if($result)
                                    {                                      
									  ?> 
									  <script language="javascript">
									  	alert ("New Machine Inserted");
									  </script>
									  <?php 
                                    }
									else
									{
										?> 
									  <script language="javascript">
									  	alert ("Error");
									  </script>
									  <?php 
									}	
                                    
                        }

	if (isset($_POST['btnupdate_ip']))
                        {
									                                                                
                        }
						
	if (isset($_POST['btnupdate_name']))
                        {
                                                                    
                        }
						
	if (isset($_POST['btnremove']))
                        {
                                include('config.php');
                        
                                    $m_type=$_POST['slttype'];
                                    $m_ip=$_POST['txtip'];
									
									$vm_type="Virtual Machine";
									$pm_type="Physical Machine";
                                    
									// Insert data into database 
                                    if($m_type == $vm_type)
                                    {
										$sql="DELETE FROM  `ndc_db`.`vm` WHERE  `vm`.`ip` =  '$m_ip' ;";
                                    }
									elseif($m_type==$pm_type)
									{
										$sql="DELETE FROM  `ndc_db`.`pm` WHERE  `pm`.`ip` =  '$m_ip' ;";
									}
									
                                    $result=mysql_query($sql);
                                    
                                    // if suceesfully inserted data into database, send confirmation link to email 
                                    if($result)
                                    {	
                                      ?> 
									  <script language="javascript">
									  	alert ("Machine Removed");
									  </script>
									  <?php 
                                    }
									else
									{
									  ?> 
									  <script language="javascript">
									  	alert ("Error");
									  </script>
									  <?php
									}	
                                    
                        }
						
	if (isset($_POST['btnaddipmi']))
                        {
                                include('config.php');
                        
                                    $m_name=$_POST['txtname'];
                                    $m_ip=$_POST['txtip'];
									
									$sql="INSERT INTO `ndc_db`.`server_ipmi` (`name`, `ip`) VALUES ('$m_name', '$m_ip');";
                                    
									$result=mysql_query($sql);
                                    
                                    // if suceesfully inserted data into database, send confirmation link to email 
                                    if($result)
                                    {	
                                      ?> 
									  <script language="javascript">
									  	alert ("Data Inserted");
									  </script>
									  <?php   
                                    }
									else
									{
									  ?> 
									  <script language="javascript">
									  	alert ("Error");
									  </script>
									  <?php 
									}	
                                    
                        }
						
	if (isset($_POST['btnaddsite']))
                        {
							include('config.php');
                        
                                    $site_name=$_POST['txtsitename'];
                                    $site_url=$_POST['txtsiteurl'];
                                    $public_ip=$_POST['txtpublicip'];
                                    $local_ip=$_POST['txtlocalip'];
									
									// Insert data into database 
                                    $sql="INSERT INTO  `ndc_db`.`live_websites` (`website_name` ,`url` ,`public_ip` ,`local_ip`) VALUES ('$site_name',  '$site_url',  '$public_ip',  '$local_ip');";
																		
                                    $result=mysql_query($sql);
                                    
                                    // if suceesfully inserted data into database, send confirmation link to email 
                                    if($result)
                                    {	
                                      ?> 
									  <script language="javascript">
									  	alert ("New Website Insert");
									  </script>
									  <?php   
                                    }
									else
									{
									  ?> 
									  <script language="javascript">
									  	alert ("Error");
									  </script>
									  <?php 
									}				
                                    
                        }
						
	if (isset($_POST['btnremovesite']))
                        {
							include('config.php');
                        
                                    $site_name=$_POST['txtsitename'];
									
									// Insert data into database 
                                    $sql="DELETE FROM  `ndc_db`.`live_websites` WHERE  `live_websites`.`website_name` =  '$site_name' ;";
																		
                                    $result=mysql_query($sql);
                                    
                                    // if suceesfully inserted data into database, send confirmation link to email 
                                    if($result)
                                    {	
                                      ?> 
									  <script language="javascript">
									  	alert ("Website Removed");
									  </script>
									  <?php   
                                    }
									else
									{
									  ?> 
									  <script language="javascript">
									  	alert ("Error");
									  </script>
									  <?php 
									}				
                                    
                        }
?>