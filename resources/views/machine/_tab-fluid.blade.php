<input type="hidden" name="leak_detector" value="0" />
<input type="checkbox" name="leak_detector" class="input-field" id="leak_detector" value="1" @if($machine->leak_detector) checked @endif/>
<label for="leak_detector">Leak detector</label>

<div class="input-field" data-onclick="addFluid">Ajouter un fluide</div>
<table class="table" id="machine-fluid-table">
	<thead>
		<tr>
			<th scope="col">Fluid type</th>
			<th scope="col">Initial load</th>
			<th></th>
		</tr>
	</thead>
	
	<tbody>
		@if( isset( $machine->fluids ) )
			@foreach( $machine->fluids as $k=>$fluid )
				<tr><input type="hidden" name="fluid[{{$k}}][id]" value="{{$fluid->pivot->id}}" />
					<td>
						<select class="fluid-type" name="fluid[{{$k}}][fluid_id]">
							@if( isset( $fluids ) )
								@foreach( $fluids as $f )
									<option value="{{$f->id}}" @if($f->id==$fluid->id) selected @endif>{{$f->name}}</option>
								@endforeach	
							@endif
						</select>
					</td>
					<td><input type="text" name="fluid[{{$k}}][load]" class="fluid-load" value="{{$fluid->pivot->load}}"/></td></tr>
				</tr>
			@endforeach	
		@endif
	</tbody>
</table>


<table class="hide">
	<tr class="hide-row-fluid-machine">
		<td>
			<select class="fluid-type">
				@if( isset( $fluids ) )
					@foreach( $fluids as $k=>$fluid )
						<option value="{{$fluid->id}}">{{$fluid->name}}</option>
					@endforeach	
				@endif
			</select>
		</td>
		<td><input type="text" class="fluid-load" value=""/></td></tr>
	</tr>
</table>