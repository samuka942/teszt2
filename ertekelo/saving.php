<?php
	require("teszt.php");
	
	$kerdoiv = new Kerdoiv();
	$kerdoiv->__construct();
	$kerdoiv->kerdesek_sql();

	var_dump($_POST);

	$ref = $_POST['ref'];
	
	if($_POST['fejl_terv'] == 'on'){
			$_POST['fejl_terv'] = "TRUE";
		}
		else{
			$_POST['fejl_terv'] = "FALSE";
		}

	foreach($_POST as $record => $value){
		if($record == 'ref'){
			mysql_query("INSERT INTO kitoltott (ref_szam) value('$value')") or exit(mysql_error());
			continue;
		}
		if($record == 'fejl_terv'){
			mysql_query("UPDATE kitoltott SET $record=$value WHERE ref_szam='$ref'")			or exit(mysql_error());
		}
		else{
			mysql_query("UPDATE kitoltott SET $record='$value' WHERE ref_szam='$ref'")			or exit(mysql_error());
		}

		
	}
?>