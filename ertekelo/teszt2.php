<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="sctipts.js" lang="JavaScript"></script>
		<?php 
			require("teszt.php");
			
			$kerdoiv = new Kerdoiv();
			
			$kerdoiv->__construct();
			$kerdoiv->kerdesek_sql();
		?>
	</head>
	<body onchange="szamol()">
		<h2>Értékelőlap</h2><br>
		<form name="teszt" action="saving.php" method="POST">
		<table>
			<tr>
				<td><label>Referencia szám</label></td>
				<td><input type="text" name="ref" id="ref" size="40" readonly></td>
			</tr>
			<tr>
				<td><label>Értékelő neve</label></td>
				<td><select id="ki" onchange="_ki()">
				<option>------Kérem Válasszon----</option>
					<option value="SzM">Szutor Márk</option>
					<option value="SGy">Samu György</option>
					<option value="TL">Téglás László</option>
				</select></td>
			</tr>
			<tr>
				<td><label>Értékelt szerző neve</label></td>
				<td><select id='kit' onchange="_kit()">
					<option>------Kérem Válasszon----</option>
					<option value="SzM">Szutor Márk</option>
					<option value="SGy">Samu György</option>
					<option value="TL">Téglás László</option>
				</select></td>
			</tr>
			<tr>
				<td><label>Értékelés dátuma</label></td>
				<td><input type="date" id="_datum" name="datum" onchange="_date()"></td>
			</tr>
			<tr>
				<td><label>Folyó napi értékelések száma</label></td>
				<td><input type="text" name="dbszam" id="dbszam"></td>
			</tr>
			<tr>
				<td><label>Fejlődési terv értékelés?</label></td>
				<td><input type="checkbox" name="fejl_terv" id="fejl_terv"></td>
			</tr>
			<tr>
				<td><label>Cikk címe</label></td>
				<td><input type="text" name="cikk_cime" ></td>
			</tr>
		</table>
		<p>
		<table>
			<tr>
				<td><label class="cimke">Kritikus követelmények</label></td>
				<td><label class="cimke">Érték</label></td>
			</tr>
		<?php $kerdoiv->kerdes_szakasz("krit"); ?>
		</table>
		<p>
		<table>
			<tr>
				<td><label class="cimke">Minőségi követelmények</label></td>
				<td><label class="cimke">Érték</label></td>
			</tr>
			<?php $kerdoiv->kerdes_szakasz("min"); ?>
			<tr>
				<td><label>Modul végső értéke</label></td>
 				<td><input type="text" name="minoseg_vege" id="minoseg_vege" value=0 readonly >%</td>
			</tr>
		</table>
		<p>
		<table>
			<tr>
				<td><label class="cimke">Határidők</label></td>
				<td><label class="cimke">Érték</label></td>
			</tr>
			<?php $kerdoiv->kerdes_szakasz("hatar"); ?>
			<tr>
				<td><label>Modul Végső Értéke</label></td>
				<td><input type="text" name="hatarido_vege" id="hatar_vege" value=0 readonly>%</td>
			</tr>
		</table>
		<p>
		<table>
			<tr>
				<td><label class="cimke">Önálló fejlődés mértéke</label></td>
				<td><label class="cimke">Érték</label></td>
			</tr>
			<?php $kerdoiv->kerdes_szakasz("fejl"); ?>
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
				<td><input type="text" name="kovetelmeny" id="kovetelmeny" size="60" readonly></td>
			</tr>
		</table>
		<p>
		<textarea name="megjegyzes" rows="20" cols="60"></textarea>
		<p>
		<input type="submit" value="Beküld" id="but"/>
		</form>
	</body>
</html>