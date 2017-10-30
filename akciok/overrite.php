<?php

require '../phpmailer/class.phpmailer.php';
require '../phpmailer/class.smtp.php';

class file_overrite{
	
	public $f;
	private $file_name;
	private $hatarido;
	private $eleje;
	private $vege;
	private $idozona;
	private $kivetelek;
	private $honnan;
	private $ar;
	
	public function __construct($File_name){
		$this->file_name = $File_name;
	}
	
	public function file_setter(){
		$this->f = file_get_contents($this->file_name);
	}
	
	
	public function Hatarido_Setter($hatarido){
		$this->f = str_replace("_hatarido_",$hatarido,$this->f);
	}
	
	public function Utazasi_ido_setter($eleje,$vege){
		$this->f = str_replace("_ido_eleje_",$eleje,$this->f);
		$this->f = str_replace("_ido_vege_",$vege,$this->f);
	}
	
	public function Idozona_setter($idozona){
		$this->f = str_replace("_idozona_",$idozona,$this->f);
	}
	
	public function article_saver(){
		$saver_file = substr($this->file_name,0,stripos($this->file_name,"."))."_kesz.txt";
		fopen($saver_file,"w");
		if(file_put_contents($saver_file,$this->f)){
			echo "A cikk törzse elkészült!";
		}
	}
	
	/*public function email_sender(){
		$error;
	$mail = new PHPMailer();  // create a new object
	$mail->CharSet = 'UTF-8';
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; //587 465
	$mail->Username = "samu942@gmail.com";  
	$mail->Password = "KurtaKoz@11";           
	$mail->SetFrom("samu.gyorgy@mndsblog.com", "Samu György");
	$mail->Subject = "Akciók";
	$mail->Body = "Az Ön által készített sablon kitöltése sikeres!\nA mellékletből le tudja tölteni!\nÜdvözlettel:\nSamu György";
	$mail->AddAddress("szutor.mark@mndsblog.com");
	$mail->addAttachment($saver_file = substr($this->file_name,0,stripos($this->file_name,"."))."_kesz.txt");
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
		} else {
		$error = 'Message sent!';
		return true;
		}
	}*/
	
	public function kivetel_setter($kivetel){
		$this->f = str_replace("_kivetelek_",$kivetel,$this->f);
	}
	
	public function varos_setter($honnan){
		$this->f = str_replace("_honnan_",$honnan,$this->f);
	}
	
	public function szazalek_setter($szazalek){
		$this->f = str_replace("_szazalek_",$szazalek,$this->f);
	}
	
	public function kezi_setter($meret){
		$this->f = str_replace("_kezi_",$meret,$this->f);
	}
	
	public function ar_setter($ar){
		$this->f = str_replace("_ar_",$ar,$this->f);
	}
	
	public function kupon_setter($kupon){
		$this->f = str_replace("_kupon_",$kupon,$this->f);
	}
	
}


?>