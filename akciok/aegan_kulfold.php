<?php

if(empty($_POST['hatarido']) || empty($_POST['IDOZONA']) || empty($_POST['ido_kezdete']) || empty($_POST['ido_vege']) || empty($_POST['kivetel'])){
		exit("Nincs kitöltve minden adat!<p><a href='index.html'>Vissza a kitöltéshez</a>".$zaroTag);
	}
	else{
		$hatarido = $_POST['hatarido'];
		$ido_kezdete = $_POST['ido_kezdete'];
		$ido_vege = $_POST['ido_vege'];
		$idozona = $_POST['IDOZONA'];
		$honnan = $_POST['honnan'];	
		
		if(!empty($_POST['kivetel'])){
			$kivetel = $_POST['kivetel'];
			$file->kivetel_setter($kivetel);
		}
	
		$file->Hatarido_Setter($hatarido);
		$file->Idozona_setter($idozona);
		$file->Utazasi_ido_setter($ido_kezdete,$ido_vege);
		$file->varos_setter($honnan);
		$file->article_saver();
		$file->email_sender();
	}

?>