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
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email;
	
	$result = mysql_query("SELECT * FROM users");
	
	$users = array();
	while ($sor = mysql_fetch_assoc($result)){
    	$users[] = $sor;
	}
	
	$login_correct = false;
	
	foreach($users as $user){
		if($username == $user['username'] && $password == $user['passwords']){
			$login_correct = true;
			$email = $user['email'];
		}
	}
	
	if($login_correct == TRUE){	
		if(!isset($_COOKIE['login'])){
			setcookie("login","$username",time()+3600);
		}
		else{
			unset($_COOKIE);
			setcookie("login","$username",time()+3600);
		}
		header("Location: ../menu/index.html");
	}
	else{
		die("A bejelentkezés sikertelen!<br><a href='index.html'>Vissza a bejelentkezéshez</a>");
	}
	
	
?>