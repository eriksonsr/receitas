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
				
				if(isset($usuario_logado)){
					if(isset($avaliacao)){
						$action = base_url('index.php/receitas/editarAvaliacao');
						$texto_input = "Editar";
						if($avaliacao->nota == 3){
							$options = "<option value='3' selected=''>Ótima</option>
								<option value='2'>Boa</option>
								<option value='1'>Ruim</option>";
						}
						if($avaliacao->nota == 2){
							$options = "<option value='3'>Ótima</option>
								<option value='2' selected=''>Boa</option>
								<option value='1'>Ruim</option>";
						}
						if($avaliacao->nota == 1){
							$options = "<option value='3'>Ótima</option>
								<option value='2'>Boa</option>
								<option value='1' selected=''>Ruim</option>";
						}
					}else{
						$action = base_url('index.php/receitas/avaliar');
						$texto_input = "Avaliar";
						$options = "<option value='3'>Ótima</option>
								<option value='2'>Boa</option>
								<option value='1'>Ruim</option>";
					}
					echo "<hr>
						<form action='" . $action ."' method='post' id='form_avalia_receita'>
							<input type='hidden' name='id_receita' value='" . $receitas[0]->id . "'>
							<label for='nota'>O que você achou desta receita?</label>
							<select name='nota' id='nota'>";
								echo $options;
					echo "</select>
							<br>
							<input type='submit' value='" . $texto_input . "'>
						</form>";
				}
			?>
		</div>
	</div>
</div>