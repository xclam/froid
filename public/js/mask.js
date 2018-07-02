$(document).ready(function(){

	$( 'form.show-form .input-field' ).each(function(){
		$( this ).prop("disabled", true);
	});

	$( 'form.show-form .btn-create' ).hide();
	$( 'form.show-form .btn-update' ).hide();
	$( 'form.show-form .btn-delete' ).prop("disabled", false);
	$( 'form.show-form .btn-back' ).prop("disabled", false);

	$( 'form.create-form .btn-create' ).prop("disabled", false);
	$( 'form.create-form .btn-update' ).prop("disabled", true).hide();
	$( 'form.create-form .btn-delete' ).prop("disabled", true).hide();
	$( 'form.create-form .btn-back' ).prop("disabled", false);

	$( 'form.edit-form .btn-create' ).prop("disabled", true).hide();
	$( 'form.edit-form .btn-update' ).prop("disabled", false);
	$( 'form.edit-form .btn-delete' ).prop("disabled", true).hide();
	$( 'form.edit-form .btn-back' ).prop("disabled", false);


});

/**
 *
 */
$( '.main-mask' ).on( 'change', '.input-field[data-control_change]', function(e){
	var func = $( this ).data( 'control_change' );
	var valide = window[func]( e, $( this ));

	if( valide === "undefined")
		return 1;

	if( !valide ){
		$( this ).css("background-color","rgb(255, 119, 119)");
		$( this ).attr( "data-valide", false );
	}else{
		$( this ).css("background-color","");
		$( this ).attr( "data-valide", true );
	}
});

/**
 * @TODO : a fusionner avec le truc au dessus
 */
$( '.main-mask' ).on( 'change', '.input-field[data-status_change]', function(e){
	var func = $( this ).data( 'status_change' );
	var valide = window[func]( e, $( this ));
});

/**
 * @TODO : a fusionner avec le truc au dessus
 */
$( '.main-mask' ).on( 'click', '.input-field[data-onclick]', function(e){
	var func = $( this ).data( 'onclick' );
	var valide = window[func]( e, $( this ));
});

$( 'body' ).on( 'click', 'button.btn-modal[data-submit]', function(e){
	$this = $(this);
	var form = $(this).get(0).form;
	var func = $this.data( 'action' ).trim();

	$.ajax({
		type: "POST",
		url: $(form).attr('action'),
		data: $(form).serialize(), // serializes the form's elements.
		success: function(data){
			window[func]( $(form).find('input[name=id]').val(), data );
		}
	 });
});

/**
 *
 */
$( '.main-mask' ).on( 'submit', 'form', function(e){

	// var r_elt = $( this ).find( '.input-field[required]' ); automatique sur les browsers actuel
	var errors = $( this ).find( '.input-field[data-valide="false"]' );
	// var errors = [];

	// console.log( elt );
	// required
	// r_elt.each(function(){
		// if( $(this).val() == "" || $(this).data("valide") == false ){
			// errors.push({
				// 'field'		: $(this),
				// 'val'		: $(this).val(),
				// 'valide'	: $(this).data("valide")
			// });
		// }
	// });

	//valide

	if( errors.length > 0 ){
		console.log(errors);
		e.preventDefault();
	}
	// $(this).data("valide") !==	'undefined'
});


/**
 * Verifie l'existance du code siret
 * @name	: checkSiret
 * @param	: Le code SIRET dont on veut vérifier la validité.
 * @return	: Un booléen qui vaut 'true' si le code SIRET passé en paramètre est valide, false sinon.
 */
function checkSiret( _siret ){
	var siret = _siret.val();
	var valide = false;

	if ( (siret.length != 14) || (isNaN(siret)) )
		valide = false;
    else {
		var sum = 0;
		var tmp;

		for (var cpt = 0; cpt<siret.length; cpt++) {
			if ((cpt % 2) == 0) { // Les positions impaires : 1er, 3è, 5è, etc...
				tmp = siret.charAt(cpt) * 2; // On le multiplie par 2
			if (tmp > 9)
				tmp -= 9;	// Si le résultat est supérieur à 9, on lui soustrait 9
			}
			else
				tmp = siret.charAt(cpt);
			sum += parseInt(tmp);
		}

		if ((sum % 10) == 0)
			valide = true; // Si la somme est un multiple de 10 alors le SIRET est valide
		else
			valide = false;

	}

	return valide;

}
