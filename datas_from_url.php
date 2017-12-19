<?php

class datas_from_url{
	
	private $url;
	
	public function __construct($url){
		$this->url = file_get_contents($url);
	}
	
	public function get_title(){
		
		$title_raw = substr($this->url,(stripos($this->url,"<title>")+7),((stripos($this->url,"</title>")-7)-stripos($this->url,"<title>")));
	
		$title = substr($title_raw,0,stripos($title_raw,"&#8211;"));
		
		return $title;
	}
	
	public function multi_author(){
		
		$author = array();
		$copytights = substr($this->url,stripos($this->url,"©"),((stripos($this->url,"Copyright by M")-6)-(stripos($this->url,">©"))+2)); 

		foreach(preg_split("/((\r?\n)|(\r\n?))/", $copytights) as $line){
			$author[] = substr($line,stripos($line," ")+1,(stripos($line,"<")-stripos($line," ")-1));
		}
		
		return $author;
	}
	
	public function single_author(){
		
		$copytight = substr($this->url,stripos($this->url,"©")+3,((stripos($this->url,"Copyright by M")-11)-(stripos($this->url,"©"))+1));
		
		return $copytight;
	}
	
}	
?>