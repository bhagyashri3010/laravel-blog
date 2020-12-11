@extends('layouts.main')

@section('content')
<!-- Main content -->
  <div class="content-wrapper">
	<section class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>Edit Blog</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="#">Home</a></li>
			  <li class="breadcrumb-item active">Edit Blog</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
	</section>
	<section class="content">
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
						<form role="form" id="edit-blog-form" action="{{ url('blog-edit/'.$blog->id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Title</label><span class="text-danger"> *</span>
											<input type="text" class="form-control" id="title" name = "title" value="{{$blog->title}}">
											@if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Category</label><span class="text-danger"> *</span>
											<select name="category_id" class="form-control select2" style="width: 100%;">
												<option value="">Please select category</option>
												@foreach($categories as $category)
													<option value="{{ $category['id'] }}" {{ $blog->category_id == $category['id'] ?'selected':' '}} >{{ $category['name'] }}</option>
												@endforeach
											</select>
											@if($errors->has('category_id')) <p style="color: red">{{  $errors->first('category_id') }}</p> @endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>Description</label>
										<textarea id="description" name="description" class="form-control">{{$blog->description}}</textarea>
										@if($errors->has('description')) <p style="color: red">{{ $errors->first('description') }}</p> @endif
									</div>
								</div>
								<div class="row" style="margin-top: 1%;">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Image :</label>
											@if($blog->image != '' && file_exists( public_path('uploads/blog_image/'.$blog->image)))
												<img src="{{ asset('uploads/blog_image/'.$blog->image) }}"  height="90" width="90" style="margin-bottom: 2%;" />
											@endif
											<div class="custom-file">
												<input type="file" name="image" class="custom-file-input" id="exampleInputFile">
												<label class="custom-file-label">Choose file</label>
											</div>
											@if($errors->has('image')) <p style="color: red">{{ $errors->first('image') }}</p> @endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Publish Blog<span class="text-danger"> *</span> </label><br>
											<input type="radio" class="is_published" name="is_published" value="1" {{ $blog->is_published == 1 ? 'checked' : '' }}> Yes
											<input type="radio" class="is_published" name="is_published" value="0" {{ $blog->is_published == 0 ? 'checked' : '' }}> No
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="button" class="submit-edit-blog-form btn btn-primary">Submit</button>
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
	$('.select2').select2();

	$('#edit-blog-form').validate({
		ignore: [],
		debug: true,
		errorClass: 'form-error',
		rules: {
			title: "required",
			category_id: "required",
			description: {
				required: function()
				{
					CKEDITOR.instances.description.updateElement();
				}
			},
			image: {
				extension: "jpeg|png|jpg|gif|svg"
			},
			is_published: "required"
		},
		messages: {
			title: "Please enter title",
			category_id: "Please select category",
			description: "Please enter description",
			image: {
				extension: "Only jpeg,png,jpg,gif,svg files allowed"
			}
		},
	});

	$(document).on('click', ".submit-edit-blog-form", function(event) {
		if($("#edit-blog-form").valid()) {
			console.log('test');
			$("#edit-blog-form")[0].submit();
		}
	});
});
</script>

 <script>
		$('textarea').ckeditor();
	</script>
@endsection
