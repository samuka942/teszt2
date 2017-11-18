<?php

class file_format{
	
	public $f;
	private $file_name;
	
	public function __construct($File_name){
		$this->file_name = $File_name;
	}
	
	public function file_setter(){
		$this->f = file_get_contents($this->file_name);
	}
	
	
	public function Hatarido_Input(){
		$hatarido = "<input type='text' name='hatarido' size='20' placeholder='Határidő'>";
		$this->f = str_replace("_hatarido_",$hatarido,$this->f);
	}
	
	public function Utazasi_ido_Input(){
		$eleje = "<input type='text' name='ido_kezdete' size='20' placeholder='Foglalási idő eleje'>";
		$vege = "<input type='text' name='ido_vege' size='20' placeholder='Foglalási idő vége'>";
		$this->f = str_replace("_ido_eleje_",$eleje,$this->f);
		$this->f = str_replace("_ido_vege_",$vege,$this->f);
	}
	
	public function Idozona_Select(){
		$idozona = "<select name='IDOZONA'>
				<option>Időzónák</option>
				<option value='EEST-ig (Kelet-Európai Nyári Idő)'>EEST</option>
				<option value='EET (Kelet-Európai Téli Idő)'>EET</option>
				<option value='GMT (Greenwich Mean Time)'>GMT</option>
				<option value='BST (British Summer Time)'>BST</option>
				<option value='CET (Közép-Európai Téli Idő)'>CET</option>
				<option value='CEST (Közép-Európai Nyári Idő)'>CEST</option>
			</select>";
		$this->f = str_replace("_idozona_",$idozona,$this->f);
	}
	
	public function kivetel_Input(){
		$kivetel = "<p><textarea rows='10' cols='60' name='kivetel' placeholder='Kivételek'></textarea><p>";
		$this->f = str_replace("_kivetelek_",$kivetel,$this->f);
	}
	
	public function varos_Input(){
		$honnan = "<input type='text' name='honnan' size='75' placeholder='Városok'>";
		$this->f = str_replace("_honnan_",$honnan,$this->f);
	}
	
	public function szazalek_Input(){
		$szazalek = "<input type='text' name='szazalek' placeholder='Százalék'>";
		$this->f = str_replace("_szazalek_",$szazalek,$this->f);
	}
	
	public function kezi_Select(){
		$meret = "<select name='KEZI'>
					<option>Poggász Méretek</option>
					<option value='(max: 42 x 32 x 25 cm)'>max: 42 x 32 x 25 cm</option>
				  </select>";
		$this->f = str_replace("_kezi_",$meret,$this->f);
	}
	
	public function ar_Input(){
		$ar = "<input type='text' name='ar' placeholder='Akcióban szereplő ár'>";
		$this->f = str_replace("_ar_",$ar,$this->f);
	}
	
	public function kupon_Input(){
		$kupon = "<input type='text' name='kupon' placeholder='Kupon'>";
		$this->f = str_replace("_kupon_",$kupon,$this->f);
	}
	
	public function elso_plusz_ido_Input(){
		$ido_elso = "<input type='text' name='ido_elso' placeholder='Második időpont kezdete'>";
		$this->f = str_replace("_ido_elso_",$ido_elso,$this->f);
	}
	
	public function masod_plusz_ido_Input(){
		$ido_masod = "<input type='text' name='ido_masod' placeholder='Mádosik időpont vége'>";
		$this->f = str_replace("_ido_masod_",$ido_masod,$this->f);
	}
	
}


?>