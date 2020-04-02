<?php

	$hostname='localhost';
	$dbname='ndc_db';
	$username='root';
	$password='ndc@123';

	mysql_connect($hostname,$username,$password) or DIE('Connection to host is failed, perhaps the service is down!');
	mysql_select_db($dbname) or DIE('Database name is not available!');

?>
