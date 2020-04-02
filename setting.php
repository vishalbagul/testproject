<?php 
if(!isset($_SESSION)) 
						{ 
						session_start(); 
						} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NDC-Server Monitor</title>
<link rel="shortcut icon" href="images/icon.ico"/>
<link href="style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="Javascript/validation.js" language="javascript"></script>

<script type="text/javascript">
function add_display(){
	document.getElementById("add_machine").style.display = "block";
	document.getElementById("edit_machine").style.display = "none";
	document.getElementById("remove_machine").style.display = "none";
	document.getElementById("add_IPMI_ILO").style.display = "none";
	document.getElementById("add_site").style.display = "none";
	document.getElementById("remove_site").style.display = "none";
} 
function edit_display(){
	document.getElementById("add_machine").style.display = "none";
	document.getElementById("edit_machine").style.display = "block";
	document.getElementById("remove_machine").style.display = "none";
	document.getElementById("add_IPMI_ILO").style.display = "none";
	document.getElementById("add_site").style.display = "none";
	document.getElementById("edit_machine_ip").style.display = "block";
	document.getElementById("edit_machine_name").style.display = "none";
	document.getElementById("remove_site").style.display = "none";
}
function edit_ip_display(){
	document.getElementById("edit_machine_ip").style.display = "block";
	document.getElementById("edit_machine_name").style.display = "none";
}
function edit_name_display(){
	document.getElementById("edit_machine_ip").style.display = "none";
	document.getElementById("edit_machine_name").style.display = "block";
}
function remove_display(){
	document.getElementById("add_machine").style.display = "none";
	document.getElementById("edit_machine").style.display = "none";
	document.getElementById("remove_machine").style.display = "block";
	document.getElementById("add_IPMI_ILO").style.display = "none";
	document.getElementById("add_site").style.display = "none";
	document.getElementById("remove_site").style.display = "none";
}
function add_ipmi_ilo_display(){
	document.getElementById("add_machine").style.display = "none";
	document.getElementById("edit_machine").style.display = "none";
	document.getElementById("remove_machine").style.display = "none";
	document.getElementById("add_IPMI_ILO").style.display = "block";
	document.getElementById("add_site").style.display = "none";
	document.getElementById("remove_site").style.display = "none";
}
function addsite_display(){
	document.getElementById("add_machine").style.display = "none";
	document.getElementById("edit_machine").style.display = "none";
	document.getElementById("remove_machine").style.display = "none";
	document.getElementById("add_IPMI_ILO").style.display = "none";
	document.getElementById("add_site").style.display = "block";
	document.getElementById("remove_site").style.display = "none";
}
function removesite_display(){
	document.getElementById("add_machine").style.display = "none";
	document.getElementById("edit_machine").style.display = "none";
	document.getElementById("remove_machine").style.display = "none";
	document.getElementById("add_IPMI_ILO").style.display = "none";
	document.getElementById("add_site").style.display = "none";
	document.getElementById("remove_site").style.display = "block";
}


</script>
</head>
<center>
<body>
<?php
						
						// Check, if user is already login, then jump to secured page
						if (isset($_SESSION['user_id'])) 
						{
?>
<div id="wrapper">
	<div id="header">
	  <div align="left"><img src="images/ndc_banner.png" align="left" /><img src="images/niclogo_small.png" align="right"/></div>
		</div    
    ><div id="main">
      <div id="nav"><a href="index.php"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.png" border="0" /></a>&nbsp;&nbsp;<a href="search.php"><img src="images/search.png" border="0" /></a>&nbsp;&nbsp;<a href="document.php"><img src="images/documents.png" border="0" /></a></div>
      <div id="left_nav">
       	<h3 align="left" style="margin-left:20px;">Virtual Machines</h3>
        <ul>
        	<li class="border"><a href="All VM.php">All Virtual Machines</a></li>
        	<li class="border"><a href="High Traffic VM.php">High-Traffic VM</a></li>
            <li class="border"><a href="Production VM.php">Production VM</a></li>
            <li class="border"><a href="Database VM.php">Database VM</a></li>
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
            <li class="border"><a href="Other PM.php">Other PM</a></li>
        </ul> 
        <h3 align="left" style="margin-left:20px;">Hosted Web-Sites</h3> 
        <ul>
        	<li class="border"><a href="Hosted Websites.php">Live Web Sites</a></li>
			<li class="border"><a href="Off Sites Report.php">Off Sites Report</a></li>
        </ul> 
        <div style="background-image:url(images/box-bg.gif); line-height:16px; height:16px;"></div>
      </div> <!-- end left_nav --> 
	  
      <div id="right_main">
      	<div style="width:100%; background-color:#EEEEEE; line-height:30px; float:left"></div>
        <div style="width:23%; float:left">
			<ul>
				<li class="border"><a href="javascript:add_display()">Add New </a></li>
				<li class="border"><a href="javascript:edit_display()">Modify</a></li>
				<li class="border"><a href="javascript:remove_display()">Remove</a></li>
				<li class="border"><a href="javascript:add_ipmi_ilo_display()">Add IPMI/ILO</a></li>
				<li class="border"><a href="javascript:edit_ipmi_ilo_display()">Modify IPMI/ILO</a></li>
			</ul>
			<ul>
				<li class="border"><a href="javascript:remove_ipmi_ilo_display()">Remove IPMI/ILO</a></li>
			</ul>
			<ul>
				<li class="border"><a href="javascript:addsite_display()">Add New Website</a></li>
				<!-- <li class="border"><a href="#">Modify Website</a></li> -->
				<li class="border"><a href="javascript:removesite_display()">Remove Website</a></li>
			</ul>
			<ul>
				<li class="border"><a href="search_p.php">Search VM Details</a></li>
				<li class="border"><a href="">Test</a></li>
			</ul>
        </div>
		
        <div id="add_machine" class="style1" style="display:none;">        
        <h3 align="left" style="margin-left:20px;">Add your New Machine</h3>
        <form method="post" action="setting.php" name="form_add" onsubmit="return add_Validate();">
   	    	<table width="80%" border="0" cellspacing="20">
              <tr align="left">
                <td>Machine Type</td>
				<td>
                	<select name="slttype">
                    	<option value = "">-- Select Machine Type --</option>
        				<option value = "Virtual Machine">Virtual Machine</option>
                        <option value = "Physical Machine">Physical Machine</option>
                   	</select>
                </td>
              </tr>
              <tr align="left">
                <td>Machine Specification</td>
              	<td>
                	<select name="sltspeci">
        				<option value = "">-- Select Machine Clustor --</option>
        				<option value = "High Traffic">High Traffic</option>
                        <option value = "Database">Database</option>
                        <option value = "Production">Production</option>
                        <option value = "Staging">Staging</option>
						<option value = "Co-Location">Co-Location</option>
						<option value = "Management">Management</option>
						<option value = "NDCSP_Delhi_DR">NDC SP DELHI DR</option>
						<option value = "other">Other</option>

                   	</select>
                </td>
              </tr>
              <tr align="left">
                <td>Machine Name</td>
                <td><input type="text" name="txtname" size="30" /></td>
              </tr>
              <tr align="left">
                <td>IP Address</td>
                <td><input type="text" name="txtip" size="30" /></td>
              </tr>
			  <tr align="left">
                <td>Operating System</td>
              	<td>
                	<select name="sltos">
        				<option value = "">-- Select Operating System --</option>
        				<option value = "Windows">Windows</option>
                        <option value = "Linux">Linux</option>
                        <option value = "Ubuntu">Ubuntu</option>
                        <option value = "CentOS">CentOS</option>
				   <option value = "VMwareESXI">VMware ESXI</option>	
                        <option value = "Suse11">Suse 11</option>
						<option value = "OtherOS">Other</option>
                   	</select>
                </td>
              </tr>
              <tr>
                <td align="right"><input type="submit" name="btnadd" value="Add New" /></td>
                <td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
              </tr>
            </table>
        </form>
        <div id="add_error_msg" style="color:#FF0000; height:25px;"></div>
        </div> <!-- end add_machine -->
        
        <div id="edit_machine" class="style1" style="display:none;">
        <h3 align="left" style="margin-left:20px;">Update your Machine</h3>
        <form action="setting.php">
   	    	<table width="80%" border="0" cellspacing="20">
              <tr align="left">
                <td><input type="radio" name="edit_page" value="IP_Address" checked onclick="javascript:edit_ip_display();"/> IP Address<br /></td>
				<td><input type="radio" name="edit_page" value="Machine_Name" onclick="javascript:edit_name_display();"/>Machine Name</td>
              </tr>
            </table>
        </form>
			<div id="edit_machine_ip" style="display:none;">
			<form name="form_edit_ip" action="setting.php" method="post" onsubmit="return modify_ip_Validate();">
				<table width="80%" border="0" cellspacing="20">
				  <tr align="left">
					<td>Machine Type</td>
					<td>
						<select name="slttype" onchange="sltip">
							<option value = "">-- Select Machine Type --</option>
							<option value = "Virtual Machine">Virtual Machine</option>
							<option value = "Physical Machine">Physical Machine</option>
						</select>
					</td>
				  </tr>
				  <tr align="left">
					<td>IP Address</td>
					<td>
						<select name="sltip">
						<option value = "">-- Select Machine IP Address --</option>
					<?php
									include("config.php");
									$m_type=$_POST['slttype'];
                                    $vm_type="Virtual Machine";
									$pm_type="Physical Machine";
                                    
									// Insert data into database 
                                    if($m_type == $vm_type)
                                    {
										$sql="SELECT * FROM  `vm`";
										$res=mysql_query($sql) or die(mysql_error());
										while (($row=mysql_fetch_array($res)))
										{ ?>
											<option value = "<?php echo $row['ip']; ?>"><?php echo $row['ip']; ?></option>
										<?php }
                                    }
									elseif($m_type==$pm_type)
									{
										$sql="SELECT * FROM  `pm`";
										$res=mysql_query($sql) or die(mysql_error());
										while (($row=mysql_fetch_array($res)))
										{ ?>
											<option value = "<?php echo $row['ip']; ?>"><?php echo $row['ip']; ?></option>
										<?php }
									}
					 ?>
					</select>
					</td>
				  </tr>
				  <tr align="left">
					<td>Machine Name</td>
					<td><input type="text" name="txtname" size="30" /></td>
				  </tr>
				  <tr>
					<td align="right"><input type="submit" name="btnupdate_ip" value="Update" /></td>
					<td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
				  </tr>
				</table>
			</form>
			</div> <!-- end edit_machine_ip -->
			
			<div id="edit_machine_name" style="display:none;">
			<form name="form_edit_name" action="setting.php" method="post" onsubmit="return modify_name_Validate();">
   	    	<table width="80%" border="0" cellspacing="20">
              <tr align="left">
                <td>Machine Type</td>
				<td>
                	<select name="slttype">
        				<option value = "">-- Select Machine Type --</option>
        				<option value = "Virtual Machine">Virtual Machine</option>
                        <option value = "Physical Machine">Physical Machine</option>
                   	</select>
                </td>
              </tr>
			  <tr align="left">
                <td>Machine Name</td>
                <td>
					<select name="sltname">
					<option value = "">-- Select Machine Name --</option>
					<?php
					include("config.php");
					$sql="SELECT * FROM  `pm` ORDER BY `pm`.`name`";
					$res=mysql_query($sql) or die(mysql_error());
					while (($row=mysql_fetch_array($res)))
					{ ?>
        				<option value = "<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
					</select>
				</td>
              </tr>
              <tr align="left">
                <td>Machine Specification</td>
              	<td>
                	<select name="sltspeci">
        				<option value = "">-- Select Machine Clustor --</option>
        				<option value = "High Traffic">High Traffic</option>
                        <option value = "Database">Database</option>
                        <option value = "Production">Production</option>
                        <option value = "Staging">Staging</option>
						<option value = "Co-Location">Co-Location</option>
                   	</select>
                </td>
              </tr>
              <tr align="left">
                <td>IP Address</td>
                <td><input type="text" name="txtip" size="30" /></td>
              </tr>
              <tr>
                <td align="right"><input type="submit" name="btnupdate_name" value="Update" /></td>
                <td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
              </tr>
            </table>
			</form>
			</div> <!-- end edit_machine_name -->
		<div id="edit_error_msg" style="color:#FF0000; height:25px;"></div>
        </div> <!-- end edit_machine -->
		
        
        <div id="remove_machine" class="style1" style="display:none;" >
        <h3 align="left" style="margin-left:20px;">Remove Machine</h3>
        <form name="form_remove" action="setting.php" method="post"  onsubmit="return remove_Validate();">
   	    	<table width="80%" border="0" cellspacing="20">
              <tr align="left">
                <td>Machine Type</td>
				<td>
                	<select name="slttype">
        				<option value = "">-- Select Machine Type --</option>
        				<option value = "Virtual Machine">Virtual Machine</option>
                        <option value = "Physical Machine">Physical Machine</option>
                   	</select>
                </td>
              </tr>
              
              <tr align="left">
                <td>IP Address</td>
                <td><input type="text" name="txtip" size="30" /></td>
              </tr>
              <tr>
                <td align="right"><input type="submit" name="btnremove" value="Remove" /></td>
                <td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
              </tr>
            </table>
        </form>
		<div id="remove_error_msg" style="color:#FF0000; height:25px;"></div>
        </div> <!-- end remove_machine -->
		
		<div id="add_IPMI_ILO" class="style1" style="display:none;">        
        <h3 align="left" style="margin-left:20px;">Add IPMI / ILO</h3>
        <form method="post" action="setting.php" name="form_add_ipmi" onsubmit="return add_IPMI_ILO_Validate();">
   	    	<table width="80%" border="0" cellspacing="20">
              <tr align="left">
                <td>Machine Name</td>
                <td><input type="text" name="txtname" size="30" /></td>
              </tr>
              <tr align="left">
                <td>IP Address</td>
                <td><input type="text" name="txtip" size="30" /></td>
              </tr>
              <tr>
                <td align="right"><input type="submit" name="btnaddipmi" value="Add IPMI / ILO" /></td>
                <td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
              </tr>
            </table>
        </form>
        <div id="add_ipmi_error_msg" style="color:#FF0000; height:25px;"></div>
        </div> <!-- end add_IPMI_ILO -->
		
		<div id="add_site" class="style1" style="display:none;">
        <h3 align="left" style="margin-left:20px;">Add New Website</h3>
        <form name="form_addsite" action="setting.php" method="post" onsubmit="return addsite_Validate();">
   	    	<table width="80%" border="0" cellspacing="20">
			  <tr align="left">
                <td>Website Name</td>
                <td><input type="text" name="txtsitename" size="30" /></td>
              </tr>
              <tr align="left">
                <td>URL</td>
                <td><input type="text" name="txtsiteurl" size="30" /></td>
              </tr>
			  <tr align="left">
                <td>Public IP</td>
                <td><input type="text" name="txtpublicip" size="30" /></td>
              </tr>
			  <tr align="left">
                <td>Local IP</td>
                <td><input type="text" name="txtlocalip" size="30" /></td>
              </tr>
              <tr align="left">
                <td>HOD</td>
                <td><input type="text" name="txthod" size="30" /></td>
              </tr>
              <tr align="left">
                <td>HOD Email</td>
                <td><input type="text" name="txthodemail" size="30" /></td>
              </tr>
              <tr align="left">
                <td>Contact</td>
                <td><input type="text" name="txtcontact" size="30" /></td>
              </tr>
              <tr align="left">
                <td>Contact Email</td>
                <td><input type="text" name="txtcontactemail" size="30" /></td>
              </tr>
              <tr>
                <td align="right"><input type="submit" name="btnaddsite" value="Add Site" /></td>
                <td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
              </tr>
            </table>
        </form>
		<div id="addsite_error_msg" style="color:#FF0000; height:25px;"></div>
        </div> <!-- end add_site -->
		
		<div id="remove_site" class="style1" style="display:none;">
        <h3 align="left" style="margin-left:20px;">Remove Website</h3>
        <form name="form_removesite" action="setting.php" method="post" onsubmit="return removesite_Validate();">
   	    	<table width="80%" border="0" cellspacing="20">
			  <tr align="left">
                <td>Website Name</td>
                <td><input type="text" name="txtsitename" size="30" /></td>
              </tr>
              <tr>
                <td align="right"><input type="submit" name="btnremovesite" value="Remove Site" /></td>
                <td align="left"><input type="reset" name="btnreset" value="Reset" /></td>
              </tr>
            </table>
        </form>
		<div id="removesite_error_msg" style="color:#FF0000; height:25px;"></div>
        </div> <!-- end remove_site -->
        <?php include('Setting1.php'); ?>
      </div> <!-- end right_main -->
    </div>
</div>
<?php
}
else
{
	header('Location: login.php');
}
?>
<div id="footer">
<h3>National Data Centre,</h3>
<h3>1st Floor, National Informatics Centre</h3>
<h3>Ganeshkhind Road, Pune - 7,</h3>
<h3>Maharashtra, INDIA</h3>
</div>
</body>
</center>
</html>
