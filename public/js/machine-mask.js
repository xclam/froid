function addFluid(e){
	var len = $("#machine-fluid-table tr").length;

	var tr = $( ".hide-row-fluid-machine" ).clone().appendTo( "#machine-fluid-table" );
	tr.removeClass("hide-row-fluid-machine");
	tr.find('.fluid-type').attr('name','fluid['+len+'][fluid_id]');
	tr.find('.fluid-load').attr('name','fluid['+len+'][load]');
}

function init_site( e, customer ){
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

	return true;
}
