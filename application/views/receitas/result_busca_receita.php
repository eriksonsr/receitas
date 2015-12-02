<div class="container conteudo">
	<div class="row">
		<div class="col-md-8" id='container_result_busca_receita'>
			<?php
			if(count($receitas) < 1){
				echo "<h3>Sua busca não retornou nenhum resultado</h3>";
			}else{
				echo "<h4>Encontramos as seguintes receitas com os ingredientes que você possui:</h4>";
				foreach ($receitas as $receita) {
					echo anchor(base_url("index.php/receitas/exibeReceita/" . $receita['id']), $receita['nome']);
					echo "<br>";
				}
			}
			?>
		</div>
	</div>
</div>