function is_society_change( e, _check ){
	var check = _check.is( ":checked" );

	if( check ){
		$( "#siret" ).prop("required",true);
	}else{
		$( "#siret" ).prop("required",false);
	}

}

function edit_customer_site( e, $this ){
	$.ajax({
		method: "GET",
		url: "/site/" + $this.attr('data-id')
	}).done(function( html ) {
			$('#modal-live').html(html);
			$('#modal-live').modal('show');
	});
}

function create_edit_site_response(id, data){
	if( typeof id === 'undefined' ){
		console.log( "undefined");
		$('#customer-sites').append(data);
	}else{
		$('.customer-site-card[data-id='+id+']').html(data);
	}
	$('#modal-live').modal('hide');
}

function add_customer_site( e, $this ){
	$.ajax({
		method: "GET",
		url: "/site/ajaxcreate/"+$this.data('id'),
	}).done(function( html ) {
			$('#modal-live').html(html);
			$('#modal-live').modal('show');
	});
}

function delete_site( e, $this ){
	e.stopPropagation();
	$.ajax({
		method: "GET",
		url: "/site/ajaxremove/"+$this.data('id'),
	}).done(function( response ) {
			if( response === 'ok' ){
				$this.hide();
			}else if( response['error'] == 23000 ){
				$('#modal-live').html(response['html']);
				$('#modal-live').modal('show');
			}
	});
}
