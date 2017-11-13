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
				<a href="index.php"><li>HOME</li></a>
				<a href="search.php"><li>SEARCH</li></a>
				<a href="#"><li>UPDATE</li></a>
				<a href="#"><li>NEW</li></a>
			</ul>
		</div>
		<div class="conteudo">
		<div class="search">
			<form class="linha" action="procura.php" method="POST">
				<h4>Pesquisar por:</h4>
				<select name="tipo">
					<option value="null"></option>
					<option value="artista">Artista</option>
					<option value="album">Album</option>
					<option value="musica">Musica</option>
				</select>
				<input type="submit"><br/>
			</form>
			<form action="busca.php" method="POST">				
				<?php
					session_start();	
					include('methods/conect.php');	
					$nome=$_POST['nome'];			
					if($_SESSION['tipo']=='artista'){
						$qquery="SELECT musicas.nome AS musica, artistas.nome AS artista, albuns.nome AS album FROM musicas JOIN artistas JOIN albuns WHERE (musicas.fk_album = albuns.id_album OR musicas.fk_album = 0) AND artistas.nome LIKE '%$nome%' AND albuns.fk_artista=artistas.id_artista";
						$_SESSION['q']=$qquery;
					}		
					else if($_SESSION['tipo']=='album'){
						$qquery="SELECT musicas.nome AS musica, artistas.nome AS artista, albuns.nome AS album FROM musicas JOIN artistas JOIN albuns WHERE (musicas.fk_album = albuns.id_album OR musicas.fk_album = 0) AND albuns.nome LIKE '%$nome%' AND albuns.fk_artista=artistas.id_artista";
						$_SESSION['q']=$qquery;
					}		
					else if($_SESSION['tipo']=='musica'){
						$qquery="SELECT musicas.nome AS musica, artistas.nome AS artista, albuns.nome AS album FROM musicas JOIN artistas JOIN albuns WHERE (musicas.fk_album = albuns.id_album OR musicas.fk_album = 0) AND musicas.nome LIKE '%$nome%' AND albuns.fk_artista=artistas.id_artista";
						$_SESSION['q']=$qquery;
					}			






					$_SESSION['q']=$qquery;
					include('methods/search.php');
				?>
			</form>
		</div>	
		</div>
		<div class="footer">
			<h4>CopyRight</h4>
		</div>
	</div>
</body>
</html>