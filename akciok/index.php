<html>
<body bgcolor="black" text="white">
<?php

require"overrite.php";


$zaroTag = '</body></html>';
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        die('Helytelen metódus!' . $zaroTag);
    }

if(!isset($_POST['FILE'])){
	exit("Nincs fájl kiválasztva!" . $zaroTag);
}

$File_name = $_POST['FILE'];

$file = new file_overrite($File_name);
$file->file_setter($File_name);

switch($File_name){
	case "aegan_belfold.txt":
		require("aegan_belfold.php");
		break;
	case "aegan_kulfold.txt":
		require("aegan_kulfold.php");
		break;
	case "wizzair_all.txt":
		require("wizzair_all.php");
		break;
	case "wizzair_club.txt":
		require("wizzair_club.php");
		break;
	case "ryanair_napi.txt":
		require("ryanair_napi.php");
		break;
	case "ryanair_tobbnapos.txt":
		require("ryanair_tobbnapos.php");
		break;
	case "ryanair_fix.txt":
		require("ryanair_fix.php");
		break;
	case "alitalia.txt":
		require("alitalia.php");
		break;
	
	default:
		break;
}



?>
</body>
</html>