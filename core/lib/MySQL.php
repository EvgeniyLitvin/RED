<?php
class MySQL extends RED{

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
	
	function select($field=NULL, $query=NULL){
		$link=mysql_connect($this->host, $this->login, $this->pass);
		$db=mysql_select_db($this->name);
		if(isset($field))
			if(isset($query)) $query = "SELECT {$field} FROM {$this->table} WHERE {$query}";
			else $query = "SELECT {$field} FROM {$this->table}";
		else $query = "SELECT * FROM {$this->table}";
		$res = mysql_query($query);
		$arr = array();
		while ( $row = mysql_fetch_array($res) ) array_push($arr, $row);
		for($j=0; $j<sizeof($arr); $j++)
			for($i=0; $i<sizeof($arr[$j])/2; $i++) unset($arr[$j][$i]);
		return $arr;
		}
	
	function update($data,$primekey){
	$update='';
	while (current($data)) {
		$update.=key($data)."='".$data[key($data)]."'";
		next($data);
		if (current($data))	$update.=',';
		}
		$query="UPDATE {$this->table} SET {$update} WHERE id='{$primekey}'";
		$result=mysql_query($query);
		return $result;
	}
	
	function insert($data){
	$keys=$values='';
		while (current($data)) {
			$keys.=key($data);
			$values.="'{$data[key($data)]}'";
			next($data);
			if (current($data)){
				$keys.=',';
				$values.=',';
				}
			}
		$query="INSERT INTO {$this->table}({$keys}) VALUES({$values})";
		$result=mysql_query($query);
		return $result;
		}
		
	function settings($name,$login,$pass,$host){
		file_put_contents('resourses/conf/database.conf', "{$name}/{$login}/{$pass}/{$host}");
		}	
	}
?>