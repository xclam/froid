<table width="100%">
	<tr>
		<th></th><th>Matin</th><th>Après Midi</th><th>Soir</th>
	</tr>
	<tr>
		<td>Heure d'arrivée</td>
		<td><input type="time" class="input-field" id="atam" name="atam" value="{{$report->atam or ''}}"/></td>
		<td><input type="time" class="input-field" id="atpm" name="atpm" value="{{$report->atpm or ''}}"/></td>
		<td><input type="time" class="input-field" id="atnty" name="atnty" value="{{$report->atnty or ''}}"/></td>
	</tr>
	<tr>
		<td>Heure de départ</td>
		<td><input type="time" class="input-field" id="dtam" name="dtam" value="{{$report->dtam or ''}}"/></td>
		<td><input type="time" class="input-field" id="dtpm" name="dtpm" value="{{$report->dtpm or ''}}"/></td>
		<td><input type="time" class="input-field" id="dtnty" name="dtnty" value="{{$report->dtnty or ''}}"/></td>
	</tr>
</table>
<div class="form-group">
	<label for="travel_time" >Temps de trajet A/R : </label>
	<input type="time" class="input-field" id="travel_time" name="travel_time" value="{{$report->travel_time or ''}}"/>
</div>