function is_society_change( _check ){
	var check = _check.is( ":checked" );
	
	if( check ){
		$( "#siret" ).prop("required",true);
	}else{
		$( "#siret" ).prop("required",false);
	}

}

/**
 * Ajoute une ligne dans le tableau des sites.
 * Verifie que les precedants soient remplis.
 */
function add_customer_site(){
	var len = $("#sites-table > input").length;
	
	var n = true;
	if( len > 0 ){
		$.each( $( '.adr-name' ), function( k, v ){
			if( v.value == "" ){
				n = false;
				console.log("name is empty");
			}
		} );
	}
	if( n ){
		$("#adr_line").val( len );
		$("#sites-table").append('<input type="text" data-line="'+len+'" class="form-control input-field adr-name" data-status_change="update_site" data-onclick="load_site" data-values="" value="" />');
		$("#sites-table").append('<input type="hidden" data-line="'+len+'" id="site_adr" name="site_adr_'+len+'" value="" />');
		reset_adr();
	}
}

/**
 * init le masque address
 */
function reset_adr(){
	$( '.address-site' ).find( '.input-field' ).each(function(){
		$(this).val("");
	});
}

/**
 * Des qu'un champ est modifié, mise à jour du champ data-values
 * pour stocker les valeurs
 */
function update_site( _field ){
	var values={};
	$( '.address-site' ).find( '.input-field' ).each(function(){
		values[$(this).attr('name')] = $(this).val();
	});
	var line = $("#adr_line").val();
	var name_field = $( '.adr-name[data-line="'+line+'"]');
	values['site_name'] = name_field.val();
	values['site_id'] = name_field.attr("id");
	var hidden_field = $( '#site_adr[data-line="'+line+'"]');
	hidden_field.val( JSON.stringify(values) );
}

/**
 * Charge le masque adresse avec les valeurs de data-vaues
 */
function load_site( _field ){
	var line = _field.data('line');
	$("#adr_line").val( line );
	reset_adr();
	try{
		var hidden_field = $( '#site_adr[data-line="'+line+'"]');
		var adr = JSON.parse( hidden_field.val() );
		$.each(adr, function( k, v){
			$( '#'+k ).val( v );
		});
	}catch ( e ){
		console.log("Not a correct JSON");
	}
}

$(document).ready(function(){
	$("#sites-table").find('.adr-name').each(function(){
		console.log('foooo');
		$(this).prop("disabled", false);
	});
});