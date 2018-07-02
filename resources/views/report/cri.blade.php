<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
@font-face {
  font-family: 'Arial';
  font-weight: normal;
  font-style: normal;
  font-variant: normal;
  src: url('../public/fonts/Arial.ttf') format('truetype');
}

@page{
size: 210mm 297mm;
margin: 0.5cm;
font-family:Arial;
	font-size:11px;
}

body{
	font-family:Arial;
	font-size:11px;
	margin:0px;
}

.page{
	margin: 0.5cm;
}
.page-break {
    page-break-after: always;
}
.center{
	text-align:center;
}
.image{
	width:80mm;
	margin-left:4mm;
	margin-right:4mm;
	height:auto;
}
table{
	border-spacing: 0px;
	font-size: inherit;
	padding: 1mm 10mm 1mm 10mm;
}
td{
	padding:1mm;
}
.blue{
	background-color:#ced7db;
	color:#121212;
}
h3{
	margin:0;
}
.h2{
	background-color:#ced7db;
	color:#121212;
	padding:1mm;
	text-align:center;
}

.header{
	width: 137mm;
    height: 137mm;
    background: url(/images/architecture-crop-nb.jpg) no-repeat 50% 0;
    padding: 10mm;
    border-bottom: 5px solid #169ACB;
    margin: auto;
}
.header-box{
	background-color: white;
    width: 100mm;
    margin: auto;
    margin-top: 0;
	padding: 15mm 5mm;
}
.cartouche{
	border-bottom : 2px solid #ced7db;
	color:#121212;
}
.font-small{
	font-size:8px;
}
.page.garde h2 {
	padding-right: 30mm;
}
.bbd{
	border-bottom:2px double #f1f1f1;
}
</style>

<div class="page garde page-break">

	<div class="header">
		<div class="header-box">
			<p class="center"><img src="{{$cpy->logo->image_path}}" /></p>
			<h1 class="center">Compte rendu d'intervention</h1>
		</div>
	</div>
	<h2 style="text-align: right;">{{$report->customer->name}}</h2>	

</div>


<div class="page page-break">

	<table class="cartouche" cellspacing="0" border="0" width="100%">
		<tr>
			<td rowspan=4 align="center" valign=middle><img src="{{$cpy->logo->image_path}}" height="40mm"/></td>
			<td rowspan=4 align="center" valign=middle><h1>Rapport d'intervention</h1>Page 1/2</td>
			<td>Technicien : {{$report->user->firstname . " " . $report->user->lastname}}</td>
		</tr>
		<tr>
			<td>Date : {{ date('d/m/Y', strtotime($report->intervention_date)) }}</td>
		</tr>
		<tr>
			<td>N&deg; : {{$report->number}}</td>
		</tr>
		<tr>
			<td rowspan=2 valign=top>{{$cpy->name}}<br><?php echo str_replace("<br/>", " ", $cpy->address); ?></td>
		</tr>
		<tr>
			<td align="center" class="font-small">Attestation de capacité : {{$cpy->certificate}}</td>
			<td align="center">Ce document doit etre conserv&eacute; 5 ans</td>
		</tr>
	</table>
		
<?php
	$val = array();
	if( isset( $report->intervention_type ) ){
		$val = explode( '-', $report->intervention_type );
	}
?>

	<table cellspacing="0" border="0" width="100%">
		<tr>
			<td><b>Nature de l'intervention</b></td>
			<td rowspan=2 align="right"><h3>Nom du client :</h3></td>
			<td rowspan=2><h3>{{$report->customer->name}}</h3></td>
		</tr>
		<tr>
			<td class="bbd">@if( !empty( $val ) and  $val[0] == 1 ) &#10004; @endif Assemblage</td>
		</tr>
		<tr>
			<td class="bbd">@if( !empty( $val ) and  $val[1] == 1 ) &#10004; @endif Mise en service</td>
			<td align="right">SIRET</td>
			<td>{{$report->customer->siret}}</td>
		</tr>
		<tr>
			<td class="bbd">@if( !empty( $val ) and  $val[2] == 1 ) &#10004; @endif Modification</td>
			<td align="right">Site :</td>
			<td>{{$report->site->name}}</td>
		</tr>
		<tr>
			<td class="bbd">@if( !empty( $val ) and  $val[3] == 1 ) &#10004; @endif Maintenance </td>
			<td align="right">Adresse :</td>
			<td><?php echo str_replace("<br/>", "\n", $report->site->address); ?></td>
		</tr>
		<tr>
			<td class="bbd">@if( !empty( $val ) and  $val[4] == 1 ) &#10004; @endif Controle d'étanchéité</td>
			<td ><br></td>
		</tr>
		<tr>
			<td class="bbd">@if( !empty( $val ) and  $val[5] == 1 ) &#10004; @endif Démantèlement</td>
			<td align="right">Horaires : </td>
			<td >{{$report->atam}} - {{$report->dtam}} / {{$report->atpm}} - {{$report->dtpm}}</td>
		</tr>
	</table>

	<h2 class="h2">ENVIRONNEMENT SANTÉ SECURITÉ</h2>	
	<table cellspacing="0" border="0" class="table">
		<tr>
			<td align="center" >QUESTIONS</td>
			<td align="center">OUI</td>
			<td align="center">NON</td>
			<td align="center" >QUESTIONS</td>
			<td align="center">OUI</td>
			<td align="center">NON</td>
		</tr>
		<tr>
			<td valign=middle>1- Le port des EPIs (&eacute;quipements de protection individuels) est-il respect&eacute; ?</td>
			<td align="center" valign=middle>@if($report->yn_epi) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_epi) &#10004; @endif</td>
			<td valign=middle>6- Le travail en hauteur comporte t'il des risques ?</td>
			<td align="center" valign=middle>@if($report->yn_work_height) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_work_height) &#10004; @endif</td>
		</tr>
		<tr>
			<td valign=middle>2- L'outillage est-il conforme et appropri&eacute; &agrave; l'intervention ?</td>
			<td align="center" valign=middle>@if($report->yn_outil) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_outil) &#10004; @endif</td>
			<td valign=middle>7- S'agit il d'un espace confin&eacute; ?</td>
			<td align="center" valign=middle>@if($report->yn_confined) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_confined)&#10004; @endif</td>
		</tr>
		<tr>
			<td valign=middle>3- Le plan de pr&eacute;vention est absent alors qu'il est nécessaire ?</td>
			<td align="center" valign=middle>@if($report->yn_plan) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_plan) &#10004; @endif</td>
			<td valign=middle>8- L'intervenant est il isol&eacute; ?</td>
			<td align="center" valign=middle>@if($report->yn_isolated) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_isolated) &#10004; @endif</td>
		</tr>
		<tr>
			<td valign=middle>4- L'acc&egrave;s est-il dangereux ?</td>
			<td align="center" valign=middle>@if($report->yn_danger) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_danger) &#10004; @endif</td>
			<td valign=middle>9- L'enlevement des déchets n'est il pas g&eacute;rable ?</td>
			<td align="center" valign=middle>@if($report->yn_waste) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_waste) &#10004; @endif</td>
		</tr>
		<tr>
			<td >5- Existe-t-il un risque autour de l'unit&eacute; ?</td>
			<td align="center" valign=middle>@if($report->yn_risk) &#10004; @endif</td>
			<td align="center" valign=middle>@if(!$report->yn_risk) &#10004; @endif</td>
		</tr>
	</table>	

<table cellspacing="0" border="0">
		<tr>
			<td align="left" >COMMENTAIRE SI NECESSAIRE :</td>
		</tr>
		<tr>
			<td align="left" >{{$report->comment_if_needed}}</td>
		</tr>
</table>		
			
	<h2 class="h2">CERTIFICAT DE CONTROLE D'ÉTANCHEITÉ DU CIRCUIT FRIGORIFIQUE</h2>		
	<table cellspacing="0" border="0" width="100%">
		<tr>
			<td>{{$report->is_leack}} &#10004; Aucune fuite detectée</td>
			<td></td>
			<td>N/S Détecteur : {{$report->detector}}</td>
		</tr>
		<tr>
			<td>Nombre de fuites réparées</td>
			<td><?php $compt = 0;
				if($report->fcr1 == 1)	$compt++;
				if($report->fcr2 == 1)	$compt++;
				if($report->fcr3 == 1)	$compt++;
				echo $compt;
				?>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>Nombre de fuites nécessitant une nouvelle intervention</td>
			<td><?php $compt = 0;
				if($report->fcr1 == 2)	$compt++;
				if($report->fcr2 == 2)	$compt++;
				if($report->fcr3 == 2)	$compt++;
				echo $compt;
				?></td>
			<td></td>
		</tr>
	</table>
</div>

<div class="page page-break">

	<table class="cartouche" cellspacing="0" border="0" width="100%">
		<tr>
			<td rowspan=4 align="center" valign=middle><img src="{{$cpy->logo->image_path}}" height="70mm"/></td>
			<td rowspan=4 align="center" valign=middle><h1>Rapport d'intervention</h1>Page 2/2</td>
			<td>Technicien : {{$report->user->firstname . " " . $report->user->lastname}}</td>
		</tr>
		<tr>
			<td>Date : {{ date('d/m/Y', strtotime($report->intervention_date)) }}</td>
		</tr>
		<tr>
			<td>N&deg; : {{$report->number}}</td>
		</tr>
		<tr>
			<td rowspan=2  valign=top>{{$cpy->name}}<br><?php echo str_replace("<br/>", " ", $cpy->address); ?></td>
		</tr>
		<tr>
			<td align="center" class="font-small">Attestation de capacité : {{$cpy->certificate}}</td>
			<td align="center">Ce document doit etre conserv&eacute; 5 ans</td>
		</tr>
	</table>

	<h2 class="h2">ÉQUIPEMENT</h2>
	<table cellspacing="0" border="0" width="100%">
		<tr>
			<td>Machine : {{$report->machine->name}}</td>
			<td>Modèle : {{$report->machine->brand}} - {{$report->machine->model}}</td></tr>
		<tr>
			<td>N° de série : {{$report->machine->serial_number}}</td>
			<td>Nature du fluide frigorigène : {{$report->machine->fluids[0]->name}}</td>
		</tr>
	</table>
	<table cellspacing="0" border="0" width="100%">
		<tr>
			<td></td>
			<td>CIRCUIT 1</td>
			<td>CIRCUIT 2</td>
			<td>CIRCUIT 3</td>
			<td>CIRCUIT 4</td>
		</tr>
		<tr>
			<td>Charge initiale</td>
			<td>{{$report->machine->fluids[0]->pivot->load}}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Quantité de fluide</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Quantité de fluide</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Quantité de fluide</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Quantité de fluide</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Quantité de fluide</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<h2 class="h2">FONCTIONNEMENT GÉNÉRAL</h2>
	<table cellspacing="0" border="0" width="100%">
		<tr>
			<td>Aspect général de l'unité</td>
			<td>Bon</td>
			<td>Moyen</td>
			<td>Médiocre</td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Conforme</td>
			<td>Non conforme</td>
			<td>Non applicable</td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Conforme</td>
			<td>Non conforme</td>
			<td>Non applicable</td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Conforme</td>
			<td>Non conforme</td>
			<td>Non applicable</td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Conforme</td>
			<td>Non conforme</td>
			<td>Non applicable</td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Réalisé</td>
			<td>Non réalisé</td>
			<td></td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Réalisé</td>
			<td>Non réalisé</td>
			<td></td>
		</tr>
		<tr>
			<td>Vérification</td>
			<td>Réalisé</td>
			<td>Non réalisé</td>
			<td></td>
		</tr>
	</table>
	
	<h2 class="h2">TRAVAIL EFFECTUÉ</h2>
	<table width="100%">
		<tr>
			<td>{{$report->performance}}</td>
		</tr>
		<tr>
			<td><h3>RESTE A FAIRE</h3></td>
		</tr>
		<tr>
			<td>{{$report->to_be_done}}</td>
		</tr>
		<tr>
	</table>
	
	<table width="100%" style="border-top:2px solid black;">
		<tr>
			<td>Client : {{$report->customer->name}}</td>
			<td>Technicien : {{$report->user->firstname . " " . $report->user->lastname}}</td>	
		</tr>
		<tr>
			<td>Observations :</td>
			<td>Signature :</td>		
		</tr>
		<tr>
			<td>Signature :</td>
			<td></td>		
		</tr>
	</table>

</div>


<div class="page">
	<h2 class="h2">Photos</h2>
	<div>
		@foreach( $report->medias as $media)
			<img src="{{$media->image_path}}" class="image"/>{{$media->status}}
		@endforeach
	</div>
</div>