<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../mndsblog.css">
		<script lang="JavaScript">
			function valt(){
				 parent.kijelzo.location.href='../kijelzo.html';
				 parent.bal.location.href='../login/index.html';
			}
		</script>
	</head>
	<body>
	<?php 
		echo "<h2>Üdvözlöm ".$_SESSION['name']."!</h2>";
	?>
		<h2>Menü</h2>
		<form>
			<p>
				<input class="button" type="button" value="Sablonok" onclick="parent.kijelzo.location.href='../akciok/fooldal.php'">
			<p>
				<input class="button" type="button" value="Értékelő lap" onclick="parent.kijelzo.location.href='../ertekelo/index.php'">
			<p>
				<input class="button" type="button" value="Kérdőív" onclick="parent.kijelzo.location.href='../kerdoiv/index.php'">
			<p>
				<input class="button" type="button" value="Kilép" onclick="valt()">
		</form>
	</body>
</html>