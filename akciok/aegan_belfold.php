<?php

if(empty($_POST['hatarido']) || empty($_POST['IDOZONA']) || empty($_POST['ido_kezdete']) || empty($_POST['ido_vege'])){
		exit("Nincs kitöltve minden adat!<p><a href='index.html'>Vissza a kitöltéshez</a>".$zaroTag);
	}
	else{		
		$hatarido = $_POST['hatarido'];
		$ido_kezdete = $_POST['ido_kezdete'];
		$ido_vege = $_POST['ido_vege'];
		$idozona = $_POST['IDOZONA'];
		
		$file->Hatarido_Setter($hatarido);
		$file->Idozona_setter($idozona);
		$file->Utazasi_ido_setter($ido_kezdete,$ido_vege);
		$file->article_saver();
		$file->email_sender();
	}

?>