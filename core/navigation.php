<?php
	class navigation{
		
		public $path;
		public $id;
		public $page;
		
		function __construct(){
			$this->path=array_filter(explode('/',$_SERVER["PHP_SELF"]));
			$this->page=$this->path[sizeof($this->path)];
			if(isset($_GET['id'])) $this->id=$_GET['id'];
			}
		
		function now(){
			return ($this->path);
			}
			
		function loadPage(){
				return ('resourses/pages/'.$this->page.'.php');
			}
			
		function id(){
			return ($this->id);
			}
			
		function loadPart($part){
			return "resourses/parts/".$part.".php";
			}
			
		function redirect($direction){
			$layout=substr($_SERVER['SCRIPT_NAME'],1);
			$layout=substr($layout,0,sizeof($layout)-5);
			header('Location:http://'.$_SERVER['HTTP_HOST'].'/'.$layout.'/'.$direction);
			}
			
		function link($direction){
			$layout=substr($_SERVER['SCRIPT_NAME'],1);
			$layout=substr($layout,0,sizeof($layout)-5);
			return ('http://'.$_SERVER['HTTP_HOST'].'/'.$layout.'/'.$direction);
		}
	}