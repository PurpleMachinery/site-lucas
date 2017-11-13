<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Musicous</title>
	<link rel="stylesheet" type="text/css" href="aparence.css">
</head>
<body>
	<div class="container">
		<div class="menu">
			<ul>
				<a href="#"><li>HOME</li></a>
				<a href="#"><li>SEARCH</li></a>
				<a href="#"><li>UPDATE</li></a>
				<a href="#"><li>NEW</li></a>
			</ul>
		</div>
		<div class="conteudo">
			<?php
				include('methods/conect.php');
				include_once('methods/selectall.php');
			?>
		</div>
	</div>
</body>
</html>