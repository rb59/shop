$(function() {
//VARIABLES GLOBALES
	var link = 'http://localhost/shop';
	var $oldervalue = "";

// Show password
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

//FORMS
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

function multiform()
{
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

loadRatings();

function loadRatings() 
{
	var elements = document.getElementsByClassName("rating");
	var requests = [];
	for(var i=0; i<elements.length;i++){
		daturl =  $('#rating-'+(i+1)).attr("action")
		requests.push(
			$.get(daturl)
		);
	}
	Promise.all(requests).then(function(data) {
		data.forEach(function (data, a){
			console.log('#rating-'+(a+1)); 
			document.getElementById('rating-'+(a+1)).innerHTML = data;
			a++;
		})
	});
}

function ren(params) {
	
}

function add(id) 
{
	jQuery.ajax(
		{
			type: "POST",
			url: $('#form-add-'+id).attr("action"),
			data: $('#form-add-'+id).serialize(),
			success: function (data) {
				$('#result-multiform').html(data);
				
			}
		});
	$("html, body").animate({
		scrollTop: 0
	}, 1500);
	
}

function addFromcart(id) 
{
	var form = document.getElementById('form-cart-'+id);
	form.setAttribute('action',form.getAttribute('action')+'/add/'+id);
	form.setAttribute('id','form-add-'+id);
	var request = []
	request.push(add(id));
	Promise.all(request).then(function() {
		
		
	window.location.href = 'http://localhost/shop/mycart';
		
	});
	form.setAttribute('id','form-cart-'+id);
	form.setAttribute('action','http://localhost/shop');
	
		
	

	/* var input = document.getElementById('input-'+id).value;
	var scale = document.getElementById('scale-'+id).value;
	if(scale == 2){
		input /= 1000
	}
	console.log(input);
	if (input < 0) {
		var quantity = document.getElementById('quantity-'+id);
		var price = document.getElementById('price-'+id).innerText;
		var subtotal = document.getElementById('subtotal').innerText;
		quantity.innerHTML =  parseFloat(quantity.innerText) + parseFloat(input);
	}*/
}

function rate(id) 
{
	jQuery.ajax(
		{
			type: "POST",
			url: $('#form-rate-'+id).attr("action"),
			data: $('#form-rate-'+id).serialize(),
			success: function (data) {
				$('#result-multiform').html(data);
				loadRatings();
			}
		});
	$("html, body").animate({
		scrollTop: 0
	}, 1500);
	
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

