<?php
	class controller extends RED{
		
		public $memory;
		
		function set($key,$value=Null){
			if(isset($value)) $this->memory[$key]=$value;
			else $this->memory[$key]=$key;
			}
			
		function get(){
			return $this->memory;
			}
		
		}
?>
