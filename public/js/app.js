

	$( '.clickable' ).on( 'click', function(){
		$( location ).attr( 'href' , $(this).attr("data-href") );
	});