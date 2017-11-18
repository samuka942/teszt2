<?php
	session_start();
?>
<?php
	
	$zarotag = "</body></html>";
	
	if($_SERVER['REQUEST_METHOD'] !== "POST"){
		die("Helytelen metódus!".$zarotag);
	}

	if(!isset($_POST['username']) || !isset($_POST['password'])){
		die("Nincs megfelelően kitöltve az űrlap!<br><a href='index.html'>".$zarotag);
	}
	
	require("../datas.php");
	
	$connect = @mysql_connect($server,$user,$pass) or exit("A csatlakozás nem sikerült");
	@mysql_select_db("mndsblog") or exit("Nem sikerült az adatbázishoz csatlakozni.");
	mysql_query("SET NAMES utf8");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email;
	
	$result = mysql_query("SELECT * FROM users");
	
	$users = array();
	while ($sor = mysql_fetch_assoc($result)){
    	$users[] = $sor;
	}
	
	$login_correct = FALSE;
	
	foreach($users as $user){
		if($username == $user['login_name'] && $password == $user['user_password']){
			$login_correct = TRUE;
			$_SESSION['name'] = $user['user_name'];
			$_SESSION['email'] = $user['email_address'];
			$_SESSION['nametag'] = $user['user_name_code'];
		}
	}
	
	if($login_correct == TRUE){	
		header("Location: ../menu/index.php");
	}
	else{
		die("A bejelentkezés sikertelen!<br><a href='index.html'>Vissza a bejelentkezéshez</a>");
	}
	var_dump($_SESSION);
	
?>