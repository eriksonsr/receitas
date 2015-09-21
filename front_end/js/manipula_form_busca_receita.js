$(document).ready(function() {
	var qtd_ingredientes = 0;
	$("#qtd_ingredientes").keyup(function(){
		qtd_ingredientes = $("#qtd_ingredientes").val();

		$(".elementos_criados").remove();
		p = $("<p class='elementos_criados'>Quais são os " + qtd_ingredientes + " ingredientes que você possui?</p>");
		$('#container_form_busca_receita').append(p);

		for(i = 1; i <= qtd_ingredientes; i++){
			label = $('<label>', {
				class: 'elementos_criados',
				for: 'ingrediente_' + i,
				text: 'Ingrediente ' + i + ": "
			});
			$('#container_form_busca_receita').append(label);

			input = $('<input>', {
				class: 'elementos_criados',
				type: 'text',
				name: 'ingrediente_' + i,
				id: 'ingrediente_' + i
			});
			$('#container_form_busca_receita').append(input);
			$('#container_form_busca_receita').append("<br class='elementos_criados'>");
		}
		input = $('<input>', {
			class: 'elementos_criados',
			type: 'submit',
			value: 'Buscar'
		});
		$('#container_form_busca_receita').append(input);
	});
});