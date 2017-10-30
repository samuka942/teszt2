<?php
	class sql{
		
		function connection_mysql($localhost,$user,$pass){
			$connect = @mysql_connect($localhost,$user,$pass)
			or exit("Nem sikerült kapcsolódni a MySQL szerverhez!");
		}
		
		function select_database($database){
			@mysql_select_db($database) or exit("Nem sikerült megnyitni az adatbázit!");
			@mysql_query("SET NAMES 'utf8'");
		}
		
		function select_table($table){
			$result = mysql_query("SELECT * FROM {$table};");
			return $result;
		}
		
		function select_table_what($table,$what="*"){
			$result = mysql_query("SELECT {$what} FROM {$table};");
			return $result;		
		}
		
		function select_table_where($table,$what="*",$where){
			$result = mysql_query("SELECT {$what} FROM {$table} WHERE '{$where}';");
			return $result; 		
		}
		
		function sql_to_array($sql){
			$array = array();
			while($row = mysql_fetch_assoc($sql)){
				$array[] = $row;
			}
			return $array;
		}
		
	}
	
	class working{
		
		function tables_echo($array_q,$array_a,$match){
			foreach ($array_q as $key => $value){
            	foreach ($array_a as $key2 => $value2) {
                	if($array_q[$key][$match]==$array_a[$key2][$match]){
                    	if($array_q[$key]['tipus']=='r'){
                        	echo "<form action='saving.php' method='POST'>
                            	<label id='kerd'>{$array_q[$key]['kerdes']}</label><br>
                            	<input type='radio' class='rad' name='r[]' value='{$array_a[$key2]['v1']}'>{$array_a[$key2]['v1']}<br>
                            	<input type='radio' class='rad' name='r[]' value='{$array_a[$key2]['v2']}'>{$array_a[$key2]['v2']}<br>
                            	<input type='radio' class='rad' name='r[]' value='{$array_a[$key2]['v3']}'>{$array_a[$key2]['v3']}<br>
                            	<input type='radio' class='rad' name='r[]' value='{$array_a[$key2]['v4']}'>{$array_a[$key2]['v4']}<br>
                            	<input type='submit' id='but' value='Next'>
                            	</form>";
                    	}
                    	else{
                        	echo "<form action='saving.php' method='POST'>
                            	<label id='kerd'>{$array_q[$key]['kerdes']}</label><br>
                            	<input type='checkbox' class='check' name='c[]' value='{$array_a[$key2]['v1']}'>{$array_a[$key2]['v1']}<br>
                            	<input type='checkbox' class='check' name='c[]' value='{$array_a[$key2]['v2']}'>{$array_a[$key2]['v2']}<br>
                            	<input type='checkbox' class='check' name='c[]' value='{$array_a[$key2]['v3']}'>{$array_a[$key2]['v3']}<br>
                            	<input type='checkbox' class='check' name='c[]' value='{$array_a[$key2]['v4']}'>{$array_a[$key2]['v4']}<br>
                            	<input type='submit' id='but' value='Next'>
                            	</form>";
                    	}
                	}
            	}
        	}
    
        }
		
	}
	
	
	$datas = new sql;
	$datas->connection_mysql("localhost","root","");
	$datas->select_database("kerdoiv");
	
	$questions = $datas->select_table_what("kerdesek","id,kerdes,tipus");
	$answers = $datas->select_table_what("kerdesek","id,v1,v2,v3,v4,tipus");
	
	$array_q = $datas->sql_to_array($questions);
	$array_a = $datas->sql_to_array($answers);
	
	$do = new working;
	$do->tables_echo($array_q,$array_a,"id");
?>