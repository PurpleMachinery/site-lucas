<?php
	# Seleciona o banco de dados 
	mysqli_select_db(  $con ,$database) or die( 'Erro na seleção do banco' );
					 
	# Executa a query desejada 
	$query = "SELECT musicas.nome AS musica, albuns.nome AS album, artistas.nome AS autor FROM musicas JOIN albuns JOIN artistas WHERE musicas.fk_album = albuns.id_album AND artistas.id_artista = albuns.fk_artista"; 
	$result_query = mysqli_query($con, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
					 
	# Exibe os registros na tela 
	while ($row = mysqli_fetch_array($result_query)) { 
		print 	"<hgroup>".
					"<h1>$row[autor]</h1>".
					"<h2>$row[album]</h2>".
					"<h3>$row[musica]</h3>".
				"</hgroup>";
	}					 




?>