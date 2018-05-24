@extends('layouts.layout')


@section('content')

<div class="main-mask">

	@yield('form')

		<div class="model-nav-bar">
			{{ Form::submit('Create', array('class' => 'btn btn-primary btn-create')) }}
			{{ Form::submit('Update', array('class' => 'btn btn-primary btn-update')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-warning btn-delete')) }}

			<?php $model = explode( ".", $action ); ?>
			
			@if( $model[1] == "show" )
				<a href="/{{$model[0]}}/{{ ${$model[0]}->id }}/edit" class="btn btn-primary btn-edit">Modify</a>
			@endif
			
			@if( $model[1] == "edit" )
				<a href="/{{$model[0]}}/{{ ${$model[0]}->id }}" class="btn btn-secondary btn-back">Back</a>
			@else
				<a href="/{{$model[0]}}" class="btn btn-secondary btn-back">Back</a>
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

@endsection

@push('script')
<script src="/js/mask.js"></script>
@endpush