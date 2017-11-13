<?php
	# Seleciona o banco de dados 
	mysqli_select_db(  $con ,$database) or die( 'Erro na seleção do banco' );
					 
	# Executa a query desejada 
	$a=$_SESSION['q'];
	$query = $a; 
	$result_query = mysqli_query($con, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
					 
	# Exibe o registros na tela 
	while ($row = mysqli_fetch_array($result_query)) { 
	print 	"<div class='bloco'>".
				"<hgroup>".
				"<h1>$row[artista]</h1>".
				"<h2>$row[musica]</h2>".
				"<h3>$row[album]</h3>".
				"</hgroup>".
			"</div>";	
			}				
?>