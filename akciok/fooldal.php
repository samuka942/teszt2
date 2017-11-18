<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body bgcolor="black" text="white">
	<p>
		<h2>Sablonok</h2>
		<p>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<select name="akciok" onchange="this.form.submit()">
				<option value="none">---------Kérem Válasszon----------</option>
				<option value="aegan_belfold">Aegan Akciók belföldre</option>
				<option value="aegan_kulfold">Aegan Külföld</option>
				<option value="wizzair_all">WizzAir mindenkinek</option>
				<option value="wizzair_club">WizzAir Club tagoknak</option>
				<option value="ryanair_napi"">%-os RyanAir napi</option>
				<option value="ryanair_tobbnapos">%-os RyanAir többnapos</option>
				<option value="ryanair_fix">RyanAir fixáras</option>	
				<option value="alitalia">Alitália</option>
				<option value="aegean_hertz">Aegean + Hertz Akció</option>
				<option value="cro_air_car" >Croatia-Arilines-Cartrawler Akciók</option>
				<option value="icelandair">IcelandAir Akciók</option>
				<option value="swiss">Swiss Akciók</option>	
			</select>
		</form>
		<form action="index.php" method="post">
			<?php
		
			include '/txt_format.php';
			
			if(!empty($_POST)){

				$_SESSION['file'] = $_POST['akciok'].".txt";
			
				$format = new file_format($_SESSION['file']);
				$format->file_setter($_SESSION['file']);
				
				switch($_SESSION['file']){
					case "aegan_belfold.txt":
						$format->Hatarido_Input();
						$format->Utazasi_ido_Input();
						$format->Idozona_Select();
						echo $format->f;
						break;
					case "aegan_kulfold.txt":
						$format->Hatarido_Input();
						$format->Utazasi_ido_Input();
						$format->Idozona_Select();
						$format->varos_Input();
						$format->kivetel_Input();
						echo $format->f;
						break;
					case "wizzair_all.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						$format->kezi_Select();
						echo $format->f;
						break;
					case "wizzair_club.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						$format->kezi_Select();
						echo $format->f;
						break;
					case "ryanair_napi.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						echo $format->f;
						break;
					case "ryanair_tobbnapos.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						echo $format->f;
						break;
					case "ryanair_fix.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->ar_Input();
						echo $format->f;
						break;
					case "alitalia.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						$format->kupon_Input();
						$format->kivetel_Input();
						echo $format->f;
						break;
					case "aegean_hertz.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						echo $format->f;
						break;
					case "cro_air_car.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->szazalek_Input();
						$format->elso_plusz_ido_Input();
						$format->masod_plusz_ido_Input();
						echo $format->f;
						break;
					case "icelandair.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						$format->elso_plusz_ido_Input();
						$format->masod_plusz_ido_Input();
						echo $format->f;
						break;
					case "swiss.txt":
						$format->Hatarido_Input();
						$format->Idozona_Select();
						$format->Utazasi_ido_Input();
						echo $format->f;
						break;
					default:
						break;
				}
			}
			?>
			<p>
				<input type="submit" value="Készít" />
		</form>
	</body>
</html>
	

