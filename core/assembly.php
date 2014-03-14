<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function __autoload($class_name) {
	include 'lib/'.$class_name.'.php';
}

global $red;

$red->nav=new navigation;
$red->sql=new MySQL;
$red->html=new HTML;

//set models
$mode=scandir("resourses/models");
	unset($mode[0]);
	unset($mode[1]);
	foreach($mode as $m){
			include 'resourses/models/'.$m;
			$mn=substr($m,0,sizeof($m)-5);
			$red->$mn=new $mn;
			}


//default variables
$id=$red->nav->id;


//caching
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
$cachetime = 18000;
	 
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    include($cachefile);
    exit;
	}
ob_start();
?>