<?php require("core/assembly.php");
?>
<!doctype html>
<html>
	<head>
		<?php
		$red->html->title();
		$red->html->charset("utf-8");
		$red->html->components();
		?>
	</head>
	<body>
		<div id="main">
			<?php require $red->nav->loadPart('menu');?>
			
			<div id="wrap">
				<br><br><br>
				<?php require $red->nav->loadPage();?>
				<br><br>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>