<div class="container conteudo">
	<div class="row">
		<div class="col-md-8" id='container_exibe_busca_receita'>
			<h3>Receitas mais acessadas</h3>
			<ol>
				<?php
					foreach ($mais_acessadas as $ma) {
						$link = anchor(base_url("index.php/receitas/exibeReceita/" . $ma->id), $ma->nome);
						echo "<li>$link</li>";
					}
				?>
			</ol>
		</div>
	</div>
</div>