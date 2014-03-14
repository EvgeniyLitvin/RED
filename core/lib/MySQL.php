<?php
class MySQL{

	public $host;
	public $name;
	public $login;
	public $pass;
	public $SQL;
	public $tables;
	public $db;

	function __construct(){
		$var=array_filter(explode('/',file_get_contents("resourses/conf/database.conf")));
		$link=mysql_connect($var[3], $var[1], $var[2]);
		$db=mysql_select_db($var[0]);
		$tableList = array();
		$res = mysql_query("SHOW TABLES");
		$arr=array();
		while ($row = mysql_fetch_array($res)) array_push($arr,$row[0]); 
		$this->tables=$arr;
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
		
	function create_models(){
		$mod=scandir("resourses/models");
		unset($mod[0]);
		unset($mod[1]);
		$arr=array();
		foreach($this->tables as $table) array_push($arr, $table.".php");
		$arr=array_diff($arr,$mod);
		foreach($arr as $model){
			$text=
"<?php
	class ".substr($model,0,sizeof($model)-5)." extends MySQL{
		public \$table='".substr($model,0,sizeof($model)-5)."';					
		}
?>";
			file_put_contents('resourses/models/'.$model, $text);
			}
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