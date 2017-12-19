<?php if (!empty($_POST)): ?>
<?php
	require_once("datas_from_url.php");
				
	$datas = new datas_from_url($_POST["url"]);
	$authors = array();
	$is_multi = false;
			
	$title = $datas->get_title();
	
	if(strpos($title,"Heti") !== false){
		$authors = $datas->multi_author();
		$is_multi = true;
	}
	else{			
		$author = $datas->single_author();
	}	
?>

<?php else: ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			
		URL: <input type="text" name="url">
		<input type="submit" value="Küld">		
		</form>
	</body>
</html>

<?php endif; ?>