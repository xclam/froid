@yield('modal-form')
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">@yield('modal-title')</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			@yield('modal-body')
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary btn-modal" data-submit="true" data-action="@yield('modal-action')">Save</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
{{Form::close()}}
