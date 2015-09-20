<div class="container">
	<div class="row">
		<div class="span5 offset3 form-actions">
			<?php
				echo form_open('receitas/resultadoBuascaReceita');
            		echo form_fieldset('Busca receitas:');
					echo form_input(array(
							'name' => 'qtd_ingredientes',
							'class' => 'span5',
							'id' => 'qtd_ingredientes',
							'placeholder' => 'Quantos Ingredientes você tem?',
							'required' => ''
					));
                
            		echo form_fieldset_close();
            	echo form_close();
			?>
		</div>
	</div>
</div>