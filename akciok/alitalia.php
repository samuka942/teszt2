<?php

if(empty($_POST['hatarido']) || empty($_POST['kupon']) || empty($_POST['IDOZONA']) || empty($_POST['ido_kezdete']) || empty($_POST['ido_vege']) || empty($_POST['szazalek'])){
		exit("Nincs kitöltve minden adat!<p><a href='index.html'>Vissza a kitöltéshez</a>".$zaroTag);
	}
	else{		
		$hatarido = $_POST['hatarido'];
		$ido_kezdete = $_POST['ido_kezdete'];
		$ido_vege = $_POST['ido_vege'];
		$idozona = $_POST['IDOZONA'];
		$szazalek = $_POST['szazalek'];
		$kupon = $_POST['kupon'];
		
		$file->Hatarido_Setter($hatarido);
		$file->Idozona_setter($idozona);
		$file->Utazasi_ido_setter($ido_kezdete,$ido_vege);
		$file->szazalek_setter($szazalek);
		$file->kupon_setter($kupon);
		if(!empty($_POST['kivetel'])){
			$kivetel = $_POST['kivetel'];
			$file->kivetel_setter($kivetel);
		}
		else{
			$kivetel = " ";
			$file->kivetel_setter($kivetel);
		}
		$file->article_saver();
	}

?>