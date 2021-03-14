var link = 'http://localhost/shop';
$(function() {

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

function remove(id) {
	jQuery.ajax(
		{
			type: "POST",
			url: $('#form-remove-'+id).attr("action"),
			data: $('#form-remove-'+id).serialize(),
			success: function (data) {
				$('#result-multiform').html(data);	
			}
		});
	$("html, body").animate({
		scrollTop: 0
	}, 1500);
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
		setTimeout(function(){window.location.href = link+'/mycart'},2000);	
	});
	form.setAttribute('id','form-cart-'+id);
	form.setAttribute('action',link);
}


function removeFromcart(id) 
{
	var form = document.getElementById('form-cart-'+id);
	form.setAttribute('action',form.getAttribute('action')+'/remove/'+id);
	form.setAttribute('id','form-remove-'+id);
	var request = []
	request.push(remove(id));
	Promise.all(request).then(function() {		
		setTimeout(function(){window.location.href = link+'/mycart'},2000);	
	});
	form.setAttribute('id','form-cart-'+id);
	form.setAttribute('action',link);
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

document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
	  if(e.keyCode == 13) {
		e.preventDefault();
	  }
	}))
});

