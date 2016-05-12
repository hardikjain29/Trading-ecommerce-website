<?php
	$connect = mysql_connect('localhost','abc','123');

	if(!$connect){
		die('No connection established! '.mysql_error());
	}

	$db_selected = mysql_select_db('trading');

	if(!$db_selected){
		die('Couldnt select database! '.mysql_error());
	}
?>