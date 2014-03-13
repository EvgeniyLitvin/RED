<?php
class HTML{

	function title($t=NULL){
		$title=array_filter(explode('/',$_SERVER["PHP_SELF"]));
		$title=ucfirst($title[2]);
		if($t!=NULL) $title=$t;
		print "<title>".$title."</title>\n";
		}
	
	function charset($charset){
		print "<meta charset='{$charset}'>\n";
		}

	function field($name ,$parameters){
		print "<p>";
		if(isset($parameters['label']) and isset($parameters['inline'])) {
			print "{$parameters['label']} ";
			}
		elseif(isset($parameters['label'])){
			print "{$parameters['label']}</p><p>";
			}
		print "<input";
		foreach($parameters as $parameter){
			print " ".key($parameters)."="."\"{$parameter}\"";
			next($parameters);
			}
		print "name=\"{$name}\"></p>\n";
		}
	
	function components(){
		$css=scandir("resourses/components/css");
		unset($css[0]);
		unset($css[1]);
		foreach($css as $style)
			print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/resourses/components/css/{$style}\">\n";
		$js=scandir("resourses/components/javascript");
		unset($js[0]);
		unset($js[1]);
		foreach($js as $script)
			print "<script type=\"text/javascript\" src=\"/resourses/components/js/{$script}\" ></script>\n";
		print "<link href=\"/resourses/components/images/favicon.ico\" rel=\"shortcut icon\" type=\"image/x-icon\">\n";
		}
	
	function read($name){
		return htmlspecialchars($_POST[$name]);
		}
	
	function createForm($name){
		print "<form method=\"POST\" name=\"{$name}\">";
		}
	
	function endForm(){
		$post=array();
		foreach($_POST as $key=>$value)	$post[$key]=htmlspecialchars($value);
		print "</form>";
		return $post;
		}
	
	}
?>