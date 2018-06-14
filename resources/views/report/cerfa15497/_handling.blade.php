<h2>Manipulation du fluide frigorigène</h2>

<h3>Quantité de fluide chargée</h3>
<div class="form-check">
	<label for="fluide-vierge" >Fluide vierge : </label>
	<input type="number" class="input-field" id="fluide-vierge" name="fluide_vierge" value="{{$report->fluide_vierge or ''}}"/>
</div>

<div class="form-check">
	<label for="fluide-recycle" >Fluide recyclé : </label>
	<input type="number" class="input-field" id="fluide-recycle" name="fluide_recycle" value="{{$report->fluide_recycle or ''}}"/>
</div>

<div class="form-check">
	<label for="fluide-regenere" >Fluide régénéré : </label>
	<input type="number" class="input-field" id="fluide-regenere" name="fluide_regenere" value="{{$report->fluide_regenere or ''}}"/>
</div>

<h3>Quantité de fluide récupérée</h3>
<div class="form-check">
	<label for="fluide-traitement" >Fluide destiné au traitement : </label>
	<input type="number" class="input-field" id="fluide-traitement" name="fluide_traitement" value="{{$report->fluide_traitement or ''}}"/>
</div>

<div class="form-check">
	<label for="fluide-conserve" >Fluide conservé pour réutilisation : </label>
	<input type="number" class="input-field" id="fluide-conserve" name="fluide_conserve" value="{{$report->fluide_conserve or ''}}"/>
</div>

<div class="form-check">
	<label for="contenant" >Identifiant du contenant : </label>
	<input type="text" class="input-field" id="contenant" name="contenant" value="{{$report->contenant or ''}}"/>
</div>