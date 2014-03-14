<?php 
	if($red->sql->check_MySQL()==false) 
		$sql="MySQL: not connected<br>";
	else $sql="MySQL: connected<br>";
	if($red->sql->check_database()==false) 
		$db="Database \"{$red->sql->name()}\": not found";
	else $db="Database: connected";
	
	$red->html->createForm('form');
	$red->html->field('host', array('label'=>'Hostname', 'type'=>'text', 'value'=>$red->sql->host()));
	$red->html->field('name', array('label'=>'Database', 'type'=>'text', 'value'=>$red->sql->name()));
	$red->html->field('login', array('label'=>'Login', 'type'=>'text', 'value'=>$red->sql->login()));
	$red->html->field('pass', array('label'=>'Password', 'type'=>'text', 'value'=>$red->sql->pass()));
	$red->html->field('submit', array('type'=>'submit', 'class'=>'button', 'value'=>'Save'));
	$red->html->field('table', array('type'=>'submit', 'class'=>'button', 'value'=>'Create models'));
	$form=$red->html->endForm();
	print $sql;
	print $db;
	if(isset($form['submit'])){
			$red->sql->settings($form['name'], $form['login'], $form['pass'], $form['host']);
			$red->nav->redirect('main','page');
			}
	if(isset($form['table'])){
			$red->sql->create_models();
			$red->nav->redirect('main','page');
			}
?>
<div class="line"></div>
<p>
 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel pharetra risus. Sed sagittis urna vitae enim dapibus condimentum. Donec convallis mattis dui sed pretium. Praesent elementum metus nec mi vestibulum ullamcorper. Aliquam tristique imperdiet dolor, a vestibulum sem congue vel. Aliquam pulvinar adipiscing scelerisque. In aliquet volutpat venenatis. Nunc non nisl mauris. Praesent faucibus tortor vel vulputate elementum.
</p>