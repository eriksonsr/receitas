<div class="container conteudo">
	<div class="row">
		<div class="col-md-12" id='container_form_cadastra_receita'>
			<?php
			if($this->session->flashdata('erro')){
                echo "<h4>" . $this->session->flashdata('erro') . "</h4>";
            }
            ?>
			<form method="post" action="<?= base_url("index.php/usuarios/logar") ?>">
				<fieldset>
					<legend>Login</legend>
					<label for="usuario">Usuario:</label>
					<input type="text" name="usuario">
					<br>
					<label for="senha">Senha:</label>
					<input type="password" name="senha">
					<br>
					<input type="submit" value="Logar">
				</fieldset>
			</form>
		</div>
	</div>
</div>