$(document).ready(function() {
	var qtd_ingredientes = 0;
	$("#qtd_ingredientes").keyup(function(){
		qtd_ingredientes = $("#qtd_ingredientes").val();

		$(".elementos_criados").remove();
		p = $("<p class='elementos_criados'>Informe os ingredientes:</p>");
		$('#container_form_cadastra_receita fieldset').append(p);

		for(i = 1; i <= qtd_ingredientes; i++){
			label = $('<label>', {
				class: 'elementos_criados',
				for: 'ingrediente_' + i,
				text: 'Ingrediente ' + i + ": "
			});
			$('#container_form_cadastra_receita fieldset').append(label);

			input = $('<input>', {
				class: 'elementos_criados',
				type: 'text',
				name: 'ingrediente_' + i,
				id: 'ingrediente_' + i
			});
			$('#container_form_cadastra_receita fieldset').append(input);

			checkbox = $('<input>', {
				class: 'elementos_criados',
				type: 'checkbox',
				name: 'obrgiatorio_' + i,
				id: 'obrgiatorio_' + i
			});
			$('#container_form_cadastra_receita fieldset').append(checkbox);

			label = $('<label>', {
				class: 'elementos_criados',
				for: 'obrgiatorio_' + i,
				text: 'Obrigatório (a receita não pode ser feita sem)'
			});
			$('#container_form_cadastra_receita fieldset').append(label);


			$('#container_form_cadastra_receita fieldset').append("<br class='elementos_criados'>");

		}

		$('#container_form_cadastra_receita fieldset').append("<br class='elementos_criados'>");
		label = $('<label>', {
			class: 'elementos_criados',
			for: 'modo_preparo',
			text: 'Modo de preparo:'
		});
		$('#container_form_cadastra_receita fieldset').append(label);

		$('#container_form_cadastra_receita fieldset').append("<br class='elementos_criados'>");
		
		textarea = $('<textarea>', {
			class: 'elementos_criados col-md-7',
			name: 'modo_preparo',
			id: 'modo_preparo'
		});
		$('#container_form_cadastra_receita fieldset').append(textarea);

		$('#container_form_cadastra_receita fieldset').append("<br class='elementos_criados'>");
		$('#container_form_cadastra_receita fieldset').append("<br class='elementos_criados'>");
		$('#container_form_cadastra_receita fieldset').append("<br class='elementos_criados'>");

		input = $('<input>', {
			class: 'elementos_criados',
			type: 'submit',
			value: 'Cadastrar'
		});
		$('#container_form_cadastra_receita fieldset').append(input);
	});
});