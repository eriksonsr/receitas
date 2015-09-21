<div class="container">
	<div class="row">
		<div class="col-md-5" id='container_form_busca_receita'>
			<?php
				echo form_open('receitas/resultadoBuascaReceita');
            		echo form_fieldset('Busca de receitas:');
								echo form_label('Quantos ingredientes você tem?', 'qtd_ingredientes');
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
<script type="text/javascript" src="<?= base_url('front_end/js/manipula_form_busca_receita.js') ?>"></script>