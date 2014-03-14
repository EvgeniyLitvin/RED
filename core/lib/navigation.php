<?php
	class navigation{
		
		public $path;
		public $id;
		public $page;
		public $category;
		
		function __construct(){
			$this->path=array_filter(explode('/',$_SERVER["PHP_SELF"]));
			$this->page=$this->path[sizeof($this->path)];
			$this->category=$this->path[sizeof($this->path)-1];
			if(isset($_GET['id'])) $this->id=$_GET['id'];
			}
		
		function now(){
			return ($this->path);
			}
			
		function loadPage($red){
				include('resourses/pages/'.$this->category.'/'.$this->page.'.php');
			}
			
		function id(){
			return ($this->id);
			}
			
		function loadPart($part, $red){
			include "resourses/parts/".$part.".php";
			}
			
		function redirect($cat,$page){
			$layout=substr($_SERVER['SCRIPT_NAME'],1);
			$layout=substr($layout,0,sizeof($layout)-5);
			header('Location:http://'.$_SERVER['HTTP_HOST'].'/'.$layout.'/'.$cat.'/'.$page);
			}
			
		function link($cat,$page){
			$layout=substr($_SERVER['SCRIPT_NAME'],1);
			$layout=substr($layout,0,sizeof($layout)-5);
			return ('http://'.$_SERVER['HTTP_HOST'].'/'.$layout.'/'.$cat.'/'.$page);
		}
	}