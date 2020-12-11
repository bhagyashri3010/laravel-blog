@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Category</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Category</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<!-- @if(count($errors)>0)
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">
					{{$error}}
				</div>
			@endforeach
		@endif -->
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Edit form</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" id="edit-category-form" action="{{ route('categories.update', ['category' => $category['id']]) }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="PUT">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Name</label><span class="text-danger"> *</span>
											<input type="text" class="form-control" id="title" name = "name" value="{{ $category['name'] }}" placeholder="Enter title">
											@if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="button" class="btn btn-primary submit-edit-category-form">Submit</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
</div>
<!-- /.content -->
@endsection

@section('additional_js')
<script>
	$(document).ready(function(){
		$('#edit-category-form').validate({
			debug: true,
			errorClass: 'form-error',
			rules: {
				name: "required",
			},
			message: {
				name: "Please enter name",
			}
		});

		$(document).on('click', ".submit-edit-category-form", function(event) {
			if($("#edit-category-form").valid()) {
				$("#edit-category-form")[0].submit();
			}
		});
	});
</script>
@endsection