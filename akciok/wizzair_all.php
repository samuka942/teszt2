<?php

	if(empty($_POST['hatarido']) || empty($_POST['IDOZONA']) || empty($_POST['ido_kezdete']) || empty($_POST['ido_vege']) || empty($_POST['szazalek']) || empty($_POST['KEZI'])){
		exit("Nincs kitöltve minden adat!<p><a href='index.html'>Vissza a kitöltéshez</a>".$zaroTag);
	}
	else{		
		$hatarido = $_POST['hatarido'];
		$ido_kezdete = $_POST['ido_kezdete'];
		$ido_vege = $_POST['ido_vege'];
		$idozona = $_POST['IDOZONA'];
		$szazalek = $_POST['szazalek'];
		$kezi = $_POST['KEZI'];
		
		$file->Hatarido_Setter($hatarido);
		$file->Idozona_setter($idozona);
		$file->Utazasi_ido_setter($ido_kezdete,$ido_vege);
		$file->szazalek_setter($szazalek);
		$file->kezi_setter($kezi);
		$file->article_saver();
		$file->email_sender();
	}

?>