<?php
class MySQL{

	public $host;
	public $name;
	public $login;
	public $pass;
	public $SQL;
	public $db;

	function __construct(){
		$var=array_filter(explode('/',file_get_contents("resourses/conf/database.conf")));
		$link=mysql_connect($var[3], $var[1], $var[2]);
		$db=mysql_select_db($var[0]);
		mysql_close($link);
		if(empty($link)) $this->SQL=false;
		else $this->SQL=true;
		if(empty($db)) $this->db=false;
		else $this->db=true;
		$this->host=$var[3];
		$this->name=$var[0];
		$this->login=$var[1];
		$this->pass=$var[2];
		}

	function check_MySQL(){
		return $this->SQL;
		}
	
	function check_database(){
		return $this->db;
		}
	
	function host(){
		return $this->host;
		}
		
	function name(){
		return $this->name;
		}
		
	function login(){	
		return $this->login;
		}
		
	function pass(){
		return $this->pass;
		}
		
	function settings($var1,$var2,$var3,$var4){
		file_put_contents('resourses/conf/database.conf', "{$var1}/{$var2}/{$var3}/{$var4}");
		}	
	}
?>