<span class="btn input-field" data-onclick="add_customer_site" data-id="@if(isset($customer)) {{$customer->id}} @else 0 @endif">{{__('Add')}}</span>

@isset($customer)
<div class="row" id="customer-sites">
	@foreach( $customer->sites as $site )
		<div class="col-4 row-eq-height mt-3">
			<div class="card input-field customer-site-card field-card" data-onclick="edit_customer_site" data-id="{{$site->id}}" >
				<div class="card-header">
					<h5 class="card-title">{{$site->name}}</h5>
					<button type="button" class="close input-field" data-onclick="delete_site" data-id="{{$site->id}}" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body ">
					<div>SIRET : {{$site->siret}}</div>
					<div>{!! $site->address !!}</div>
				</div>
			</div>
		</div>
	@endforeach
</div>
@endisset
