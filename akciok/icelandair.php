<?php

if(empty($_POST['hatarido']) || empty($_POST['IDOZONA']) || empty($_POST['ido_kezdete']) || empty($_POST['ido_vege']) || empty($_POST['ido_elso']) || empty($_POST['ido_masod'])){
		exit("Nincs kitöltve minden adat!<p><a href='index.html'>Vissza a kitöltéshez</a>".$zaroTag);
	}
	else{		
		$hatarido = $_POST['hatarido'];
		$ido_kezdete = $_POST['ido_kezdete'];
		$ido_vege = $_POST['ido_vege'];
		$idozona = $_POST['IDOZONA'];
		$ido_elso = $_POST['ido_elso'];
		$ido_masod = $_POST['ido_masod'];
		
		$file->Hatarido_Setter($hatarido);
		$file->Idozona_setter($idozona);
		$file->Utazasi_ido_setter($ido_kezdete,$ido_vege);
		$file->elso_plusz_ido_setter($ido_elso);
		$file->masod_plusz_ido_setter($ido_masod);
		$file->article_saver();
	}

?>