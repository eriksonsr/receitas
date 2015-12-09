<div class="container conteudo">
	<div class="row">
		<div class="col-md-8" id='container_exibe_busca_receita'>
			<h3>Últimas receitas acessadas</h3>
			<ol>
				<?php
					foreach ($ult_rec_acessadas as $ura) {
						$link = anchor(base_url("index.php/receitas/exibeReceita/" . $ura->id_receita), $ura->nome);
						echo "<li>$link</li>";
					}
				?>
			</ol>
		</div>
	</div>
</div>