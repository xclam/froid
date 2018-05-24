<style>
	.bordered{border:1px solid black;}
</style>

<?php echo $report; ?>
<div style="height:9%;width:100%;">cerfa N°15497*02</div>

<div>FICHE D'INTERVENTION / BORDEREAU DE SUIVI DE DÉCHETS DANGEREUX pour les opérations nécessitant une manipulation de
	fluides frigorigènes effectuées sur un équipement, prévus aux articles R.543-82 et R.541-45 du code de l'environnement</div>
<div >FICHE N°:</div>

<div>
	<div>[1] OPERATEUR (Nom, adresse et SIRET):</div>
	<div></div>
	<div>Attestation de capacité n° </div><div></div>
</div>

<div>
	<div>[2] DETENTEUR (Nom, adresse et SIRET) :</div>
	<div><?php echo $customer->name . "<br/>" . $address->street . "<br/>" . $customer->siret; ?></div>
</div>

<div>
	<div>[3] Equipement
concerné :</div>
	<div>Identification :</div>
	<div>Nature du fluide frigorigène :</div>
	<div>Tonnage équivalent CO2 (HFC/PFC)</div>
</div>