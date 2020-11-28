@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>General Form</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">General Form</li>
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
						<form role="form" action="{{ url('add-blog') }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Title</label><span class="text-danger"> *</span>
											<input type="text" class="form-control" id="title" name = "title" placeholder="Enter title">
											@if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Category</label><span class="text-danger"> *</span>
											<select name="category_id" class="form-control select2" style="width: 100%;">
												<option value="">Please select category</option>
												@foreach($categories as $category)
													<option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
												@endforeach
											</select>
											@if($errors->has('category_id')) <p style="color: red">{{  $errors->first('category_id') }}</p> @endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>Description</label>
										<textarea id="description" name="description" class="form-control"></textarea>
										@if($errors->has('description')) <p style="color: red">{{ $errors->first('description') }}</p> @endif
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<div class="custom-file">
												<input type="file" name="image" class="custom-file-input">
												<label class="custom-file-label">Choose file</label>
												@if($errors->has('image')) <p style="color: red">{{ $errors->first('image') }}</p> @endif
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Publish Blog<span class="text-danger"> *</span> </label><br>
											<input type="radio" class="is_published" name="is_published" value="1" checked> Yes
											<input type="radio" class="is_published" name="is_published" value="0" > No
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
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
	$('.select2').select2()
});
</script>

 <script>
		$('textarea').ckeditor();
	</script>
@endsection
