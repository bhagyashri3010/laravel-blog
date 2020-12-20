@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>About Us</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">About Us</li>
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
							<h3 class="card-title">Add form</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form id="add-about-form" role="form" action="{{ url('add-about_us') }}" method="post">
							{{ csrf_field() }}
							<div class="card-body">
								{{-- <div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Title</label><span class="text-danger"> *</span>
											<input type="text" class="form-control" id="title" name = "title" placeholder="Enter title">
											@if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif
										</div>
									</div>
								</div> --}}
								<div class="row">
									<div class="col-md-12">
										<label>Description</label><span class="text-danger"> *</span>
                                    <textarea id="description" name="description" class="form-control">{{ isset($about->content) ? $about->content:''}}</textarea>
										@if($errors->has('description')) <p style="color: red">{{ $errors->first('description') }}</p> @endif
									</div>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="button" class="submit-add-about-form btn btn-primary">Submit</button>
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
$(document).ready(function() {
	//Initialize Select2 Elements
	// $('.select2').select2();

	$('#add-about-form').validate({
		ignore: [],
		debug: true,
		errorClass: 'form-error',
		rules: {
			description: {
				required: function()
				{
					CKEDITOR.instances.description.updateElement();
				}
			},
		},
		messages: {
			description: "Please enter description",
		},
	});

	$(document).on('click', ".submit-add-about-form", function(event) {
		if($("#add-about-form").valid()) {
			$("#add-about-form")[0].submit();
		}
	});
});
$('textarea').ckeditor();
</script>

@endsection
