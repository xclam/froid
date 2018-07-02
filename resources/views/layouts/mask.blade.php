@extends('layouts.layout')


@section('content')

<div class="main-mask">

	@yield('form')

		<div class="model-nav-bar">
			{{ Form::submit(__('Create'), array('class' => 'btn btn-primary btn-create')) }}
			{{ Form::submit(__('Update'), array('class' => 'btn btn-primary btn-update')) }}
			{{ Form::submit(__('Delete'), array('class' => 'btn btn-warning btn-delete')) }}

			<?php $model = explode( ".", $action ); ?>
			
			@if( $model[1] == "show" )
				<a href="/{{$model[0]}}/{{ ${$model[0]}->id }}/edit" class="btn btn-primary btn-edit">{{__("Modify")}}</a>
			@endif
			
			@if( $model[1] == "edit" )
				<a href="/{{$model[0]}}/{{ ${$model[0]}->id }}" class="btn btn-secondary btn-back">{{__("Back")}}</a>
			@else
				<a href="/{{$model[0]}}" class="btn btn-secondary btn-back">{{__("Back")}}</a>
			@endif

			@yield('mask-nav-bar')
		</div>	
		
		<div class="card">
			
			<div class="card-header ">
				@yield('mask-header')
			</div>

			<div class="card-body ">
			
				@yield('mask-tabs')
				
				<div class="tab-content" >
				
					@yield('mask-content-tab')
					
				</div>
				
			</div>
			
			<div class="card-footer ">
				@yield('mask-footer')
			</div>
		  
		</div>

	</form>
	
</div>
<div id="modal-live" class="modal fade" tabindex="-1" role="dialog"></div>
@endsection

@push('script')
<script src="/js/mask.js"></script>
@endpush