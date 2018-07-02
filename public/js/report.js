function init_site_machine( e, customer ){
	$.ajax({
		method: "GET",
		url: "/customer/site/list",
		data: { id: customer.val() }
	}).done(function( msg ) {
		$('#site').children('option:not(:first)').remove();
		$.each( msg, function( a, b ){
			$('#site').append('<option value="'+b.id+'">'+b.name+'</option>');
		});
	});

	$.ajax({
		method: "GET",
		url: "/customer/machine/list",
		data: { id: customer.val() }
	}).done(function( msg ) {
		$('#machine').children('option:not(:first)').remove();
		$.each( msg, function( a, b ){
			$('#machine').append('<option value="'+b.id+'">'+b.name+'</option>');
		});
	});

	return true;
}

function init_machine( e, site ){
	$.ajax({
		method: "GET",
		url: "/site/machine/list",
		data: { id: site.val() }
	}).done(function( msg ) {
		$('#machine').children('option:not(:first)').remove();
		$.each( msg, function( a, b ){
			$('#machine').append('<option value="'+b.id+'">'+b.name+'</option>');
		});
	});
	return true;
}

$(document).ready(function(){

	$( '#show-report :input' ).each(function(){
		$( this ).prop("disabled", true);
	});

	// $( 'form.show-form .btn-create' ).hide();
	// $( 'form.show-form .btn-update' ).hide();
	// $( 'form.show-form .btn-delete' ).prop("disabled", false);
	// $( 'form.show-form .btn-back' ).prop("disabled", false);

	// $( 'form.create-form .btn-create' ).prop("disabled", false);
	// $( 'form.create-form .btn-update' ).prop("disabled", true).hide();
	// $( 'form.create-form .btn-delete' ).prop("disabled", true).hide();
	// $( 'form.create-form .btn-back' ).prop("disabled", false);

	// $( 'form.edit-form .btn-create' ).prop("disabled", true).hide();
	// $( 'form.edit-form .btn-update' ).prop("disabled", false);
	// $( 'form.edit-form .btn-delete' ).prop("disabled", true).hide();
	// $( 'form.edit-form .btn-back' ).prop("disabled", false);


});
