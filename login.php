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

</head>
<center>
<body>
<div id="wrapper">
	<div id="header">
	  <div align="left"><img src="images/ndc_banner.png" align="left" /><img src="images/niclogo_small.png" align="right"/></div>
	</div    
    ><div id="main">
	<?php
		// Check, if user is already login, then jump to secured page
		if (isset($_SESSION['user_id'])) {
		header('Location: setting.php');		
		}

	?>
      <div id="nav"><a href="index.php"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="#"><img src="images/setting.png" border="0" /></a>&nbsp;&nbsp;<a href="search.php"><img src="images/search.png" border="0" /></a>&nbsp;&nbsp;<a href="document.php"><img src="images/documents.png" border="0" /></a></div>
     <div style="background:url(images/body_bg.png); width:100%; float:left;"> 
      <div style="width:100%; height:150px; float:left;"></div>
	  <div style="width:100%; float:left;">
		<form method="post" action="login.php" name="form_login" onsubmit="return Login_Validate();">
		<table width="30%"  style="border-style:solid; border-width:thin; border-color:#999999; background-color:#FFFFFF;" cellspacing="10">
          <tr>
            <td id="table_authe" colspan="2" bgcolor="#CCCCCC">User-Login</td>
          </tr>
		  <tr>
            <td id="table_authe">Username :</td>
            <td id="table_authe"><input type="text" class="textboxcss" name="user" size="25"/></td>
          </tr>
		  <tr>
            <td id="table_authe">Password :</td>
            <td id="table_authe"><input type="password" class="textboxcss" name="pass" size="25"/></td>
          </tr>
		  <tr>
            <td colspan="2" align="center"><input type="submit" value="Login" name="btnsubmit" />&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td>
          </tr>
		 </table>
		 </form>
		 </br>
			<div id="login_error_msg" style="color:#FF0000; height:25px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px;">
			                <?php
                            if(isset($_POST["btnsubmit"]))
								{
									$username = $_POST['user'];
									$password = $_POST['pass'];

									if($username =="admin"  && $password == "password")
									{
										$_SESSION['user_id'] = $username;
										header('Location: setting.php');
									}
									else 
									{
									?>
										<script type="text/javascript" src="Javascript/validation.js" language="javascript">
											document.getElementById("login_error_msg").innerHTML="Wrong password and/or username";
										</script>
									<?php
									}
								}								
							?>
			</div>
	  </div>
	  <div style="width:100%; height:125px; float:left;"></div>
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
