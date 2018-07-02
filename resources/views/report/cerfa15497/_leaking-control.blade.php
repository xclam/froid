

<h2>Contrôle d'étanchéité</h2>

<div class="form-group">
	<label for="detector">Detecteur manuel de fuite</label>
	<input type="text" id="detector" name="detector" value="{{$report->detector or ''}}"/>
</div> 	

<div class="form-group">
	<label for="qdf">Quantité de fluide</label>
	<input type="number" name="qdf" id="qdf" value="{{$report->fluid_amount or $report->machine->fluids[0]->pivot->load}}"/>
	<span>Kg</span>
</div>	

<div class="form-check">
	<label for="sdf1">Présence d'un systeme de detection des fuites</label>
	<input type="hidden" value="0" name="sdf" >
	<input type="checkbox" value="1" name="sdf" id="sdf1" />
</div>

<h3>Fuite constatée</h3>
<div class="form-check">
	<label for="is_leak">Fuites constatées lors du contrôle d'étanchéité</label>
	<input type="hidden" name="is_leak" value="0" />
	<input type="checkbox" name="is_leak" class="input-field" id="is_leak" value="1" @if($report->machine->is_leak) checked @endif/>
</div>
<table width="100%">
	<tr>
		<td rowspan=2>1</td>
		<td rowspan=2><textarea id="fc1" name="fc1">{{$report->fc1 or ''}}</textarea></td>
		<td>
			<input type="radio" name="fcr1" value="1" id="fcr1-1" @if($report->fcr1 == 1) checked @endif/><label for="fcr1-1">Réalisée</label>
		</td>
	</tr>
	<tr>
		<td>
			<input type="radio" name="fcr1" value="2" id="fcr1-2" @if($report->fcr1 == 2) checked @endif/><label for="fcr1-2">A faire</label>
		</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td rowspan=2>2</td>
		<td rowspan=2><textarea id="fc2" name="fc2">{{$report->fc2 or ''}}</textarea></td>
		<td>
			<input type="radio" name="fcr2" value="1" id="fcr2-1" @if($report->fcr2 == 1) checked @endif/><label for="fcr2-1">Réalisée</label>
		</td>
	</tr>
	<tr>
		<td>
			<input type="radio" name="fcr2" value="2" id="fcr2-2" @if($report->fcr2 == 2) checked @endif/><label for="fcr2-2">A faire</label>
		</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td rowspan=2>3</td>
		<td rowspan=2><textarea id="fc3" name="fc3">{{$report->fc3 or ''}}</textarea></td>
		<td>
			<input type="radio" name="fcr3" value="1" id="fcr3-1" @if($report->fcr3 == 1) checked @endif/><label for="fcr3-1">Réalisée</label>
		</td>
	</tr>
	<tr>
		<td>
			<input type="radio" name="fcr3" value="2" id="fcr3-2" @if($report->fcr3 == 2) checked @endif/><label for="fcr3-2">A faire</label>
		</td>
	</tr>
</table>
	