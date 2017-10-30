<html>
<head>
	<meta charset="utf-8">
	<script src="ertek_szamol.js" lang="JavaScript"></script>
	<link rel="stylesheet" type="text/css" href="../mndsblog.css">
</head>
<body onkeyup="szamol()">
<?php
	class kiir{
		function table_feltolt($array){
			foreach($array as $row){
				echo "<tr>
				<td><label>{$row['kerdes']}</label></td>
				<td><input type='text' name='{$row['mezo_nev']}' id='{$row['mezo_nev']}' value=0></td>
			</tr>";
	}
		}
	}	
?>
<?php
	$connect = @mysql_connect("localhost", "root", "") or exit("Nem sikerült kapcsolódni a MySQL szerverhez!".mysql_error);
	@mysql_select_db("teszt") or exit("Nem sikerült megnyitni az adatbázist!".mysql_error);
    @mysql_query("SET NAMES 'utf8'");
    
    $krit = array();
    $min = array();
    $hatar = array();
    $fejl = array();
    
    $result = mysql_query("SELECT * FROM sablon ");
    
    $lap = array();
        while ($sor = mysql_fetch_assoc($result)){
           if($sor['tipus'] == "min"){
		   		$min[] = $sor;
		   }
		   if($sor['tipus'] == "hatar"){
		   		$hatar[] = $sor;
		   }
		   if($sor['tipus'] == "fejl"){
		   		$fejl[] = $sor;
		   }
		   if($sor['tipus'] == "krit"){
		   		$krit[] = $sor;
		   }
        }
        
        $kiir = new kiir();
        
        ?>
<form name="teszt" action="saving.php" method="post">
<p>
		<table>
			<tr>
				<td><label>Referencia szám</label></td>
				<td><input type="text" name="ref" id="ref" size="40" readonly></td>
			</tr>
			<tr>
				<td><label>Értékelő neve</label></td>
				<td>Ide majd egy select lesz</td>
			</tr>
			<tr>
				<td><label>Értékelt szerző neve</label></td>
				<td>Ide majd egy select lesz</td>
			</tr>
			<tr>
				<td><label>Értékelés dátuma</label></td>
				<td><input type="text" name="datum" id="datum" readonly></td>
			</tr>
			<tr>
				<td><label>Folyó napi értékelések száma</label></td>
				<td><input type="text" name="dbszam" id="dbszam" readonly></td>
			</tr>
			<tr>
				<td><label>Fejlődési terv értékelés?</label></td>
				<td><input type="checkbox" name="fejl_terv" id="fejl_terv"></td>
			</tr>
			<tr>
				<td><label>Cikk címe</label></td>
				<td><input type="text" name="cikk" ></td>
			</tr>
		</table>
	
<p>
	<table>
		<tr>
			<td><label>Kritikus követelmények</label></td>
			<td><label>Érték</label></td>
		</tr>
		<?php $kiir->table_feltolt($krit); 	?>
	</table>
<p>
	<table>
		<tr>
			<td><label>Minőségi követelmények</label></td>
			<td><label>Érték</label></td>
		</tr>
		<?php $kiir->table_feltolt($min); 	?>
		<tr>
			<td><label>Modul végső értéke</label></td>
 			<td><input type="text" name="minoseg_vege" id="minoseg_vege" value=0 readonly >%</td>
		</tr>
	</table>
<p>
	<table>
		<tr>
			<td><label>Határidők</label></td>
			<td><label>Érték</label></td>
		</tr>
		<?php $kiir->table_feltolt($hatar); 	?>
		<tr>
				<td><label>Modul Végső Értéke</label></td>
				<td><input type="text" name="hatarido_vege" id="hatarido_vege" value=0 readonly>%</td>
			</tr>
	</table>
<p>
	<table>
		<tr>
			<td><label>Önálló fejlődés mértéke</label></td>
			<td><label>Érték</label></td>
		</tr>
		<?php $kiir->table_feltolt($fejl); 	?>
		<tr>
				<td><label>Modul Végső Értéke</label></td>
				<td><input type="text" name="fejlod_vege" id="fejlod_vege" value=0 readonly>%</td>
			</tr>
	</table>
<p>
	<table id="eredmenyek">
			<tr>
				<td><label>Kritikus?</label></td>
				<td><input type="text" name="krit" id="krit" readonly></td>
			</tr>
			<tr>
				<td><label>Végső eredmény</label></td>
				<td><input type="text" name="vege" id="vege" readonly>%</td>
			</tr>
			<tr>
				<td><label>A kritikus hiba nélkül</label></td>
				<td><input type="text" name="no_krit" id="no_krit" readonly>%</td>
			</tr>
			<tr>
				<td><label>A szerkesztő, és az átnézett cikk a szerkesztőségi követelményeknek megfelelt?</label></td>
				<td><input type="text" name="kovetelmeny" id="kovetelmeny" readonly></td>
			</tr>
		</table>
	<p>
		<input type="submit" value="Küld">
		<p>
</body>
</html>