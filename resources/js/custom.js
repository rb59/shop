$(function() {
//VARIABLES GLOBALES
	var link = 'http://localhost/jsbasics';
	var $oldervalue = "";
// ANTERIOR Y SIGUIENTE MULTIPLES SECCIONES	
	$('.btnNext').click(function() {
		$('.nav-borders .active').parent().next('li').find('a').trigger('click');
	});

	$('.btnPrevious').click(function() {
		$('.nav-borders .active').parent().prev('li').find('a').trigger('click');
	});
// PARA MOSTRAR CONTRASEÑA
	$('.input-group').find('.password-box').each(function(index, input) {
		var $input = $(input);
		$(input).parent().find('.password-visibility').on('click',function(e){
			e.preventDefault();
			var change = "";
			if ($(this).find('i').hasClass('fa-eye')) {
				$(this).find('i').removeClass('fa-eye')
				$(this).find('i').addClass('fa-eye-slash')
				change = "text";
			} else {
				$(this).find('i').removeClass('fa-eye-slash')
				$(this).find('i').addClass('fa-eye')
				change = "password";
			}
			var rep = $("<input type='" + change + "' />")
				.attr('id', $input.attr('id'))
				.attr('name', $input.attr('name'))
				.attr('class', $input.attr('class'))
				.attr('maxlength', $input.attr('maxlength'))
				.val($input.val())
				.insertBefore($input);
			$input.remove();
			$input = rep;
		}).insertAfter($input);
	});
// PARA NO REPETIR LA PREGUNTA SELECCIONADA
	$(".sel").each(function() {
		$(this).data('original', $(this).html());
	});
	$(document).on('change', '.sel', function() {
		$('.sel').each(function() {
			var valor = $(this).val();
			$(this).html($(this).data('original'));
			$(this).val(valor);
		});
		$('.sel').each(function() { 
			$(this).siblings().find('option[value="' + $(this).val() + '"]').remove();
		});
	});	
//AJAX PARA VARIOS FORM
	$(document).on('click','#multiform_complete',function(e){
		e.preventDefault();
		multiform();
	});

//eliminar espacio en blanco en inputs
	$(".withoutspace").keyup(function(){              
		var value = $(this).val();
		$(this).val(value.replace(/ /g, ''));
	}); 

// VERIFICACIÓN DEL EMAIL
	$('#checkemail').click(function() {
		var post_url;
		var $value;
		post_url = link+'/checkemail';
		$value = $('#email').val();
		if($oldervalue == $value){
			return;
		}			
		$oldervalue = $value;
		$.post( post_url, {name: $value}, function( response ) {
		  $("#email-check").html( response );
		});
	});
// BACK TO TOP
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
		  $('.scroll-top').fadeIn();
		} else {
		  $('.scroll-top').fadeOut();
		}
	  });	
	$('.scroll-top').click(function () {
	$("html, body").animate({
		scrollTop: 0
	}, 1500);
		return false;
	});
});
function previewImage() {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImage').files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreview').src = e.target.result;         
    };     
}
function eliminar(title,texto, ruta){
	alertify.confirm(texto, function(e){
		if (e){
			location.href = ruta;
		}
	}).set({title:title}).set({labels:{ok:'Confirmar', cancel: 'Cancelar'}});             
}

function confirmar_multiform(title,texto){
	alertify.confirm(texto, function(e){
		if (e){
			multiform();
		}
	}).set({title:title}).set({labels:{ok:'Confirmar', cancel: 'Cancelar'}});             
}

function confirmar_form(title,texto,formulario){
	alertify.confirm(texto, function(e){
		if (e){
			document.getElementById(formulario).submit();
		}
	}).set({title:title}).set({labels:{ok:'Confirmar', cancel: 'Cancelar'}});             
}

function multiform(){
	var elements = document.getElementsByClassName("form-control");
	for(var i=0; i<elements.length;i++){
		if( (!$("#"+elements[i].name).val()) || ($("#"+elements[i].name).val() <= 0)) {	
			$("#"+elements[i].name).addClass('input-error');
		}else{
			$("#"+elements[i].name).removeClass('input-error');
		}
	}
	jQuery.ajax({
		type: "POST",
		url: $('#form').attr("action"),
		data: $('#form').serialize(),
		success: function (data) {
			$('#result-multiform').html(data);
		}
	});
}

function name(params) {
	
}

function url(uri){
	var action = $('#select_post').attr("action");
	location.href = action+"/categoria/"+uri;
}
document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
	  if(e.keyCode == 13) {
		e.preventDefault();
	  }
	}))
});