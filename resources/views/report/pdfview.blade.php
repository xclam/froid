<style>
	.bordered{border:1px solid black;}
</style>

<?php echo $report; ?>
<div style="height:9%;width:100%;">cerfa N°15497*02</div>

<div>FICHE D'INTERVENTION / BORDEREAU DE SUIVI DE DÉCHETS DANGEREUX pour les opérations nécessitant une manipulation de
	fluides frigorigènes effectuées sur un équipement, prévus aux articles R.543-82 et R.541-45 du code de l'environnement</div>
<div >FICHE N°:</div>
<div ></div>

<div>
	<div>
		<div>[1] OPERATEUR (Nom, adresse et SIRET):</div>
		<div></div>
		<div>Attestation de capacité n° </div>
		<div></div>
	</div>

	<div>
		<div>[2] DETENTEUR (Nom, adresse et SIRET) :</div>
		<div><?php echo $report->customer->name . "<br/>" . 
			$report->customer->address->street . "<br/>" . 
			$report->customer->siret; ?>
		</div>
	</div>
</div>

<div>
	<div>[3] Equipementconcerné :</div>
	<div><span>Identification :								</span><span></span></div>
	<div><span>Nature du fluide frigorigène :			</span><span>R-		Charge Totale :	kg</span></div>
	<div><span>Tonnage équivalent CO2 (HFC/PFC)	</span><span>teq CO2</span></div>
</div>

<div>
	<div>[4] Nature de l'intervention :</div>
	<div>@include('report.cerfa15497._intervention-type')</div>
	<div>Observations :</div>
</div>

<div>
	<div>
		<div>Contrôle d'étanchéité</div>
		<div>Identification</div>
		<div>Contrôlé le</div>
	</div>
	<div>
		<div>[5] Détecteur manuel de fuite</div>
		<div></div>
		<div>{{$report->intervention_date}}</div>
	</div>
</div>

<div>[6] Présence d'un système de détection des fuites :</div>

<div>Fréquence minimale du contrôle périodique</div>

<div>
	<div>
		[7] Quantité de fluide frigorigène dans l'équipement 
	</div>
	<div><div>HCFC</div><div>2 kg &le; Q < 30 kg</div><div>30 kg &le; Q < 300 kg</div><div>Q &ge; 300 kg</div></div>
	<div><div>HFC/PFC</div><div>5 t &le; teqCO2 < 50 t</div><div>50 t &le; teqCO2 < 500 t</div><div>teqCO2 &ge; 500 t</div></div>
</div>
<div><div>[8] Équip. HCFC et équip. HFC sans système de détection des fuites</div><div>12 mois</div><div>6 mois</div><div>3 mois</div></div>
<div><div>[9] Équipements HFC avec système de détection des fuites</div><div>24 mois</div><div>12 mois</div><div>6 mois</div></div>

<div>
	<div>[10] Fuites constatées lors du contrôle d'étanchéité</div>
	<div>
		<div>oui non</div>
		<div>N°</div><div>Localisation de la fuite</div><div>Réparation de la fuite</div>
		<div>1</div><div></div><div>Réalisée
A faire</div>
		<div>2</div><div></div><div>Réalisée
A faire</div>
		<div>3</div><div></div><div>Réalisée
A faire</div>
	</div>
</div>