<div class="container">
	<div class="row">
		<div class="col-md-12" id='container_form_cadastra_receita'>
			<?php
				echo form_open('Unidades/salvar');
            		echo form_fieldset('Cadastrar unidade:');
            			echo form_label('Nome da unidade de medida?', 'nome');
            			echo form_input(array(
								'name' => 'nome',
								'id' => 'nome',
								'required' => '',
								'value' => set_value("nome")
						));

            			echo "<br>";

            			echo form_label('Unidade de medida?', 'unidade');
            			echo form_input(array(
								'name' => 'unidade',
								'id' => 'unidade',
								'required' => '',
								'value' => set_value("unidade")
						));
            		
		                echo form_button(array(
		                        "class" => "btn btn-default",
		                        "content" => "Cadastrar",
		                        "type" => "submit"
		                ));
            		echo form_fieldset_close();
            	echo form_close();
			?>
		</div>
	</div>
</div>