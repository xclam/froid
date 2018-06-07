
<div class="form-group form-check-inline">
	<label for="qdf">Quantité de fluide</label>
	<input type="number" class="form-check-input" name="qdf" id="qdf" value="{{$report->machine->fluids[0]->pivot->load}}"/>
	<span>Kg</span>
</div>	


<div class="form-check form-check-inline">
	<label for="sdf1">Présence d'un systeme de detection des fuites</label>
	<input type="hidden" value="0" name="sdf" >
	<input class="form-check-input" type="checkbox" value="1" name="sdf" id="sdf1" @if($report->machine->leak_detector) checked @endif/>
</div>


<div class="form-group">
	<label for="fc">Fuite constatée</label>
	<textarea id="fc" name="fc"></textarea>
</div> 	