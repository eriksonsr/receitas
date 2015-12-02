<div class="container conteudo">
	<div class="row">
		<div class="col-md-8" id='container_exibe_busca_receita'>
			<?php
				echo "<h4>Receita: " . $receitas[0]->nome . "</h4>";
				echo "<h4>Ingredientes:</h4>";
				echo "<ul>";
					foreach ($receitas as $receita) {
						echo "<li>" . $receita->ingrediente . "</li>";
					}
				echo "</ul>";
				echo "<h4>Modo de preparo:</h4>";
				echo "<p>" . $receitas[0]->modo_preparo . "</p>";
			?>
		</div>
	</div>
</div>