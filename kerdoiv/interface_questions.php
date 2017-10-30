<script lang="Javascript">
	function _rad(){
		var checkedValue = null; 
		var inputElements = document.getElementsByClassName('rad');
		for(var i=0; inputElements[i]; ++i){
      		if(inputElements[i].checked){
           		checkedValue = inputElements[i].value;
           		break;
      		}
		}
		if(checkedValue==null){
			alert("Nem válaszolt a kérdésre!");
		}
	}
	
	function _check(){
		var checkedValue = null; 
		var inputElements = document.getElementsByClassName('check');
		for(var i=0; inputElements[i]; ++i){
      		if(inputElements[i].checked){
           		checkedValue = inputElements[i].value;
           		break;
      		}
		}
		if(checkedValue==null){
			alert("Nem válaszolt a kérdésre!");
		}
	}
	function _plus(){
		document.cookie = "id=1";
		location.reload();
	}	
</script>
<?php
    $connect = @mysql_connect("localhost", "root", "") or exit("Nem sikerült kapcsolódni a MySQL szerverhez!".mysql_error);
    @mysql_select_db("kerdoiv") or exit("Nem sikerült megnyitni az adatbázist!".mysql_error);
    @mysql_query("SET NAMES 'utf8'");

	if(isset($_COOKIE['id'])){
    
    if($_COOKIE['id'] != 0 ){
    
        $sql = "SELECT COUNT(*) as db FROM kerdesek";

        $result = mysql_query($sql);

        $db = array();
        while ($sor = mysql_fetch_assoc($result)){
            $db[] = $sor;
        }

        if($_COOKIE['id']<=$db[0]['db']){

        $sql = "SELECT id,kerdes,tipus FROM kerdesek where id='{$_COOKIE['id']}'";

        $result_k = mysql_query($sql);

        $kerdesek = array();
        while ($sor = mysql_fetch_assoc($result_k)){
            $kerdesek[] = $sor;
        }

        $sql = "SELECT id,v1,v2,v3,v4 FROM kerdesek where id='{$_COOKIE['id']}'";

        $result_v = mysql_query($sql);
                
        $valaszok = array();
        while ($sor = mysql_fetch_assoc($result_v)){
            $valaszok[] = $sor;
        }
   
        foreach ($kerdesek as $key => $value){
            foreach ($valaszok as $key2 => $value2) {
                if($kerdesek[$key]['id']==$valaszok[$key2]['id']){
                    if($kerdesek[$key]['tipus']=='r'){
                        echo "<form action='saving.php' method='POST'>
                            <label id='kerd'>{$kerdesek[$key]['kerdes']}</label><br>
                            <input type='radio' class='rad' name='r[]' value='{$valaszok[$key2]['v1']}'>{$valaszok[$key2]['v1']}<br>
                            <input type='radio' class='rad' name='r[]' value='{$valaszok[$key2]['v2']}'>{$valaszok[$key2]['v2']}<br>
                            <input type='radio' class='rad' name='r[]' value='{$valaszok[$key2]['v3']}'>{$valaszok[$key2]['v3']}<br>
                            <input type='radio' class='rad' name='r[]' value='{$valaszok[$key2]['v4']}'>{$valaszok[$key2]['v4']}<br>
                            <input type='submit' id='but' value='Tovább' onclick='_rad()'>
                            </form>";
                    }
                    else{
                        echo "<form action='saving.php' method='POST'>
                            <label id='kerd'>{$kerdesek[$key]['kerdes']}</label><br>
                            <input type='checkbox' class='check' name='c[]' value='{$valaszok[$key2]['v1']}'>{$valaszok[$key2]['v1']}<br>
                            <input type='checkbox' class='check' name='c[]' value='{$valaszok[$key2]['v2']}'>{$valaszok[$key2]['v2']}<br>
                            <input type='checkbox' class='check' name='c[]' value='{$valaszok[$key2]['v3']}'>{$valaszok[$key2]['v3']}<br>
                            <input type='checkbox' class='check' name='c[]' value='{$valaszok[$key2]['v4']}'>{$valaszok[$key2]['v4']}<br>
                            <input type='submit' id='but' value='Tovább' onclick='_check()'>
                            </form>";
                    }
                }
            }
        }
        
        }
    }
	}
    else{
    	setcookie("id","0",0);
        echo "<form>
              <img src='elso.gif' onclick='_plus()'>
              </form>";
    }

?>