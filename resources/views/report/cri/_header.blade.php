<div id="report-header" class="card">
	@if( isset( $report->number ) )
		<h1>Report : {{ $report->number }}</h1>
	@endif

	@if( isset( $report->customer ) )
		<h2>Customer : <a href="<?= url("/customer/{$report->customer->id}");?>">{{ $report->customer->name }}</a></h2>
	@else
		<div class="form-group">
			<label for="customer">Customer</label>
			<select name="customer_id" id="customer" class="form-control input-field"
				data-control_change="init_site_machine" required>
				<option value="">Select a customer</option>
				@foreach( $customers as $key=>$val )
					<option value="{{$key}}">{{$val}}</option>
				@endforeach
			</select>
		</div> 
	@endif
	
	@if( isset( $report->site ) )
		<h2>Site : {{ $report->site->name or ''}}</h2>
	@else
		<div class="form-group">
			<label for="site">Site</label>
			<select name="site_id" id="site" class="form-control input-field"
				data-control_change="init_machine" required>
				<option value="">Select a site</option>
				@foreach( $sites as $site )
					<option value="{{$site->id}}" 
						data-customer="{{$site->customer_id}}">{{$site->name}}</option>
				@endforeach
			</select>
		</div> 
	@endif

	@if( isset( $report->machine ) )
		<h2>Machine : <a href="<?= url("/machine/{$report->machine->id}");?>">{{ $report->machine->name }}</a></h2>
	@else
		<div class="form-group">
			<label for="machine">Machine</label>
			<select name="machine_id" id="machine" class="form-control input-field" required>
				<option value="">Select a machine</option>
				@foreach( $machines as $machine )
					<option value="{{$machine->id}}" 
						data-customer="{{$machine->customer_id}}"
						data-site="{{$machine->site_id}}">{{$machine->name}}</option>
				@endforeach
			</select>
		</div>
	@endif


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
			<input type="checkbox" name="is_cerfa" id="cerfa" @if($report->is_cerfa) checked @endif/>
			<span class="slider round"></span>
		</label>
		
	</div>

</div>