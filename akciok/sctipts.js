function _add(){
	
	var txtfile = "c:/wamp/www/akciok/aegan_belfold.txt";
	var file = new File(txtfile);
	
	file.open("r");
	
	var str = "";
	while(!file.eof){
		str += file.readline() + "\n";
	}
	file.close();
	
	alert(str);
	
}