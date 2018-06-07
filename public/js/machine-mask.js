function addFluid(){
	var len = $("#machine-fluid-table tr").length;
	
	// var n = true;
	// if( len > 0 ){
		// $.each( $( '.fluid-type' ), function( k, v ){
			// if( v.value == "" ){
				// n = false;
				// console.log("name is empty");
			// }
		// } );
	// }
	// console.log(len);
	// if( n ){
		
	// $("#machine-fluid-table").append('<tr><td><input type="text" name="fluid['+len+'][type]" class="fluid-type"/></td><td><input type="text" name="fluid['+len+'][load]" class="fluid-load"/></td></tr>');
		var tr = $( ".hide-row-fluid-machine" ).clone().appendTo( "#machine-fluid-table" );
		tr.removeClass("hide-row-fluid-machine");
		tr.find('.fluid-type').attr('name','fluid['+len+'][fluid_id]');
		tr.find('.fluid-load').attr('name','fluid['+len+'][load]');
	// }
	
}
