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
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Javascript/validation.js" language="javascript"></script>

</head>
<center>
<body>
<div id="wrapper">
	<div id="header"><img src="images/banner.png" align="middle" /></div>    
    <div id="main">
	<?php
		// Check, if user is already login, then jump to secured page
		if (isset($_SESSION['user_id'])) {
		header('Location: setting.php');		
		}

	?>
      <div id="nav"><a href="index.php"><img src="images/home.png" border="0" /></a>&nbsp;&nbsp;<a href="#"><img src="images/setting.png" border="0" /></a>&nbsp;&nbsp;<a href="search.php"><img src="images/search.png" border="0" /></a></div>
      <div style="width:1200px; height:150px; float:left; background-color:#FFFFFF;"></div>
	  <div style="width:1200px; float:left; background-color:#FFFFFF; ">
		<form method="post" action="login_p.php" name="form_login" onsubmit="return Login_Validate();">
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

									if($username =="admin"  && $password == "admin@pass")
									{
										$_SESSION['user_id'] = $username;
										header('Location: setting_p.php');
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
	  <div style="width:1200px; height:150px; float:left; background-color:#FFFFFF;"></div>
	  <div style="width:1200px; height:100px; float:left;"></div>	  
    </div>
</div>
<div id="footer"></div>
</body>
</center>
</html>
