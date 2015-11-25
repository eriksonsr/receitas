<div class="container conteudo">
	<div class="row">
		<div class="col-md-8" id='container_result_busca_receita'>
			<?php
			if(count($receitas) < 1){
				echo "<h3>Sua busca não retornou nenhum resultado</h3>";
			}else{
				foreach ($receitas as $receita) {
					echo "<h4>Receita: " . $receita['nome'] . "</h4>";
					echo "<h4>Ingredientes:</h4>";

					echo "<ul>";
					foreach ($receita['ingredientes'] as $ingrediente) {
						echo "<li>" . $ingrediente['ingrediente'] . "</li>";
					}
					echo "</ul>";
					echo "<h4>Modo de preparo:</h4>";
					echo "<p>" . $receita['modo_preparo'] . "</p>";
				}
			}
			?>
		</div>
	</div>
</div>