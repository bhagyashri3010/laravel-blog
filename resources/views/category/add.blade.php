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
						<form role="form" action="{{ route('categories.store') }}" method="post">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Name</label><span class="text-danger"> *</span>
											<input type="text" class="form-control" id="title" name = "name" placeholder="Enter title">
											@if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
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
