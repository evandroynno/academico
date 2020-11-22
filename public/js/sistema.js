$(document).ready(function($){
	$('#modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Botão que acionou o modal
		var recipient = button.data('solicitacao') // Extrai informação dos atributos data-*
		// Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
		// Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
		var modal = $(this)
		modal.find('.solicitacao').text('Nova mensagem para ' + recipient)
		modal.find('.modal-body input').val(recipient)
	})

	$('#busca').hideseek({
		nodata: 'Registro não encontrado',
		ignore: '.ignore'
	});
    $('.select-multiple').select2(
		{placeholder:'Selecione as disciplinas'}
	);
	$("#checkTodos").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
	});
});
$('body').on('shown.bs.modal', '.modal', function() {
	$(this).find('select').each(function() {
	  var dropdownParent = $(document.body);
	  if ($(this).parents('.modal.in:first').length !== 0)
		dropdownParent = $(this).parents('.modal.in:first');
	  $(this).select2({
		dropdownParent: dropdownParent
		// ...
	  });
	});
  });

$('#uf').change(function(){
	// var stateId = $(this).find(':selected').attr("data-id");
	var stateId = $(this).val();
	$.get('/academico/public/getCidades/'+ stateId, function(data){
		$('#cidade').prop('disabled', false);
		$('#cidade').empty();
		$('#cidade').append('<option value="">Escolha uma cidade</option>');
		console.log(this);
		$.each(data, function(index, cidade){
			$('#cidade').append('<option value="'+cidade.name+'">'+cidade.name+'</option>');
		})
	});

})

function getCidades(x){
	var stateId = x;
	$.get('/academico/public/getCidades/'+ stateId, function(data){
		$('#cidade').prop('disabled', false);
		$('#cidade').empty();
		$('#cidade').append('<option value="">Escolha uma cidade</option>');
		console.log(this);
		$.each(data, function(index, cidade){
			$('#cidade').append('<option value="'+cidade.name+'">'+cidade.name+'</option>');
		})
	});
}

$('#mes').change(function(){
	var mes = $(this).val()
	$(location).attr('href', '/admin/historico_movimentacao/'+mes);
})
var maskBehavior = function (val) {
	return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
},
options = {
	onKeyPress:
		function(val, e, field, options) {
			field.mask(maskBehavior.apply({}, arguments), options);
		}
};
$(document).ready(function($){
	$('#telefone').mask(maskBehavior, options);
});
