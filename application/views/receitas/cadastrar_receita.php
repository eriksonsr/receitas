<div class="container">
	<div class="row">
		<div class="col-md-12" id='container_form_cadastra_receita'>
			<?php
				echo form_open('receitas/salvarReceita');
            		echo form_fieldset('Cadastrar receita:');
            			echo form_label('Nome da receita?', 'nome');
            			echo form_input(array(
								'name' => 'nome',
								'id' => 'nome',
								'required' => '',
								'value' => set_value("nome")
						));

            			echo "<br>";

						echo form_label('Quantos ingredientes a receita tem?', 'qtd_ingredientes');
						echo form_input(array(
								'name' => 'qtd_ingredientes',
								'id' => 'qtd_ingredientes',
								'required' => ''
					));
            		echo form_fieldset_close();
            	echo form_close();
			?>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= base_url('front_end/js/manipula_form_cad_receita.js') ?>"></script>