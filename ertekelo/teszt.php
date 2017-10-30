<?php

class Kerdoiv{
		
		private $server = "localhost";
		private $user = "root";
		private $pass = "";
		
		public function __construct(){
			$connect = @mysql_connect($this->server,$this->user,$this->pass) or exit("Nem sikerült kapcsolódni a MySQL szerverhez!".mysql_error);
			@mysql_select_db("teszt") or exit("Nem sikerült megnyitni az adatbázist!".mysql_error);
    		@mysql_query("SET NAMES 'utf8'");
		}
		
		public $sql;
		public $kerdesek;
		
		public function kerdesek_sql(){
			
			$this->sql = mysql_query("SELECT * FROM sablon");
			
			$this->kerdesek = array();
			while($sor = mysql_fetch_assoc($this->sql)){
				$this->kerdesek[] = $sor;	
			}
		}
		
		public $szakasz = array();
		
		public function kerdes_szakasz($tipus){
			
			foreach($this->kerdesek as $kerdes){
				if($kerdes['tipus'] == $tipus){
					$this->szakasz[] = $kerdes;
				}			
			}
			foreach($this->szakasz as $kerdes){
				echo "<tr><td><label>".$kerdes['kerdes']."</label></td><td><select name='".$kerdes['mezo_nev']."'>";
				for($i = $kerdes['min_ertek']; $i < $kerdes['max_ertek']+1;$i++){
					echo "<option value='$i' >$i</option>";
				}
				echo "</select></td></tr>";
			unset($this->szakasz);
			}
		}
	}
?>