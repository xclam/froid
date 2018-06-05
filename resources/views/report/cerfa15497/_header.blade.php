<div id="report-header" class="card">

	@if( isset( $report->number ) )
		<h1>Report : {{ $report->number }}</h1>
	@endif

	@if( isset( $report->customer ) )
		<h2>Customer : <a href="<?= url("/customer/{$report->customer->id}");?>">{{ $report->customer->name }}</a></h2>
	@else
		<div class="form-group">
			<label for="customer">Customer</label>
			<select name="customer_id" id="customer" class="form-control input-field">
				<option value="">Select a customer</option>
				@foreach( $customers as $key=>$val )
					<option value="{{$key}}">{{$val}}</option>
				@endforeach
			</select>
		</div> 
	@endif

	@if( isset( $report->machine ) )
		<h2>Machine : <a href="<?= url("/machine/{$report->machine->id}");?>">{{ $report->machine->name }}</a></h2>
	@else
		<div class="form-group">
			<label for="machine">Machine</label>
			<select name="machine_id" id="machine" class="form-control input-field">
				<option value="">Select a machine</option>
				@foreach( $machines as $machine )
					<option value="{{$machine->id}}" data-customer="{{$machine->customer_id}}">{{$machine->name}}</option>
				@endforeach
			</select>
		</div>
	@endif

	<div class="form-group form-group col-12 col-md-6">
		<label for="intervention_date">Intervention date</label>
		<input type="date" id="intervention_date" name="intervention_date" class="form-control input-field" 
			value="@if( isset($report->intervention_date) ) $report->intervention_date @else date("Y-m-d") @endif"/>
	</div>

</div>