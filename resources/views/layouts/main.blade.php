@include('layouts.header')
<body>

<div class="wrapper">
	<!-- <div>
		<a href="{{ url('user_logout') }}" style="float: right; color: red">Logout</a>
	</div> -->
@include('layouts.sidebar')
@yield('content')
</div>

<div id="myModal2" class="modal fade" role="dialog" data-backdrop="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="h3">Delete Modal</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						Are you Sure?
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="yes" class="btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default close_modal" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div id="publish-modal" class="modal fade" role="dialog" data-backdrop="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="h3">Publish Modal</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="publish/change" method="POST" id="publish-form">
							{{ csrf_field() }}
							<input type="hidden" name="publish_id" id="publish-id">
							<input type="hidden" name="publish_value" id="publish-value">
						</form>
						Are you Sure?
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="done" class="btn btn-danger">Yes</button>
				<button type="button" class="btn btn-default close_modal" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div id="multiple_delete" class="modal fade" tabindex="-1" role="dialog" data-backdrop="true" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="h3">Delete Modal</h3>
			</div>
			<div class="modal-body">
				<input type="hidden" class="multi_id" name="hidden_del" value="">
				<div class="row">
					<input type="hidden" name="hidden_del" value="">
					<div class="col-md-12">
						Are you Sure?
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="sure" class="delete_accessory_btn btn btn-danger">Delete</button>
				<button type="button" class="btn btn-default close_modal" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

</body>
@include('layouts.footer')