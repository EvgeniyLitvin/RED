<?php require("core/assembly.php");?>
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
			<?php $red->nav->loadPart('menu',$red);?>
			<div id="wrap">
				<br><br><br>
				<?php $red->nav->loadPage($red);?>
				<br><br>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>