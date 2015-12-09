$(document).ready(function() {
	$('#form_avalia_receita').submit(function() {
	    var form = $(this);
	    $.post(form.attr('action'), form.serialize(), function(retorno) {
	        if(retorno > 0){
	        	alert("Obrigado! Receita avaliada com sucesso!");
	        }else{
	        	alert("Oooops! Ocorreu um erro!");
	        }
	    });
	    return false;
	});
});