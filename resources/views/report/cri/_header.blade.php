<div id="report-header" class="card">
	@if( isset( $report->number ) )
		<h1>Report : {{ $report->number }}</h1>
	@endif

	<div class="form-group">
		<label for="customer">Customer</label>
		<select name="customer_id" id="customer" class="form-control input-field"
			data-control_change="init_site_machine" required>
			<option value="">Select a customer</option>
			@foreach( $customers as $key=>$val )
				<option value="{{$key}}" @if( isset( $report->customer ) and $report->customer->id == $key ) selected @endif >{{$val}}</option>
			@endforeach
		</select>
	</div>


		<div class="form-group">
			<label for="site">Site</label>
			<select name="site_id" id="site" class="form-control input-field"
				data-control_change="init_machine" required>
				<option value="">Select a site</option>
				@foreach( $sites as $site )
					@if( isset( $report->customer ) and $report->customer_id == $site->customer_id )
						<option value="{{$site->id}}"
							@if( isset( $report->site ) and $report->site->id == $site->id ) selected @endif
							data-customer="{{$site->customer_id}}">{{$site->name}}</option>
					@endif
				@endforeach
			</select>
		</div>


		<div class="form-group">
			<label for="machine">Machine</label>
			<select name="machine_id" id="machine" class="form-control input-field" required>
				<option value="">Select a machine</option>
				@foreach( $machines as $machine )
					@if( isset( $report ) and $report->site_id == $machine->site_id )
						<option value="{{$machine->id}}"
							@if( isset( $report->machine ) and $report->machine->id == $machine->id ) selected @endif
							data-customer="{{$machine->customer_id}}"
							data-site="{{$machine->site_id}}">{{$machine->name}}</option>
					@endif
				@endforeach
			</select>
		</div>



	<?php
	$d = "";
	if( isset( $report->intervention_date ) )
		$d = date('Y-m-d', strtotime($report->intervention_date));
	else
		$d = date('Y-m-d');
	?>
	<div class="form-group">
		<label for="intervention_date">Intervention date</label>
		<input type="date" id="intervention_date" name="intervention_date" class="form-control input-field"
			value="{{$d}}" required/>
	</div>

	<div class="form-group">
		<label for="cerfa">Remplir le cerfa manipulation des fluides</label>
		<label class="switch">
			<input type="checkbox" name="is_cerfa" id="cerfa" @if(isset($report) && $report->is_cerfa) checked @endif/>
			<span class="slider round"></span>
		</label>

	</div>

</div>
