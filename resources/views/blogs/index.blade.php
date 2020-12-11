@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Blogs</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Blogs</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Blog Listing</h3>
								<span>
									<a href="#multiple_delete" class="btn-danger create-btn btn-sm" id = "multiple_delete_button">Delete</a>
								</span>
								<span>
									<a href="{{ url('create-blog') }}" class="btn-primary create-btn btn-sm" style="margin-right: 2%;">Create</a>
								</span>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="blog_table" class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px"><input type="checkbox" id="checkAll" name=""></th>
											<th>Title</th>
											<th>Category</th>
											<th>Created On</th>
											<th>Publish</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
								<!-- <table id="blog_table" class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px"><input type="checkbox" id="checkAll" name=""></th>
											<th>Title</th>
											<th>Category</th>
											<th>Created On</th>
											<th>Publish</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($blog_data as $blog)
										<tr>
											<td>
												<input type="checkbox" name="multi_delete[]" class="multi_del" data-id = "{{ $blog['id']}}">
											</td>
											<td>{{ $blog['title'] }}</td>
											<td>{{ $blog['category']['name'] }}</td>
											<td>@if($blog['created_at'])
													{{ date(date('d-m-Y', strtotime($blog['created_at']))) }}
												@else
													N.A
												@endif
											</td>
											<td>
												<a href="javascript:void(0)" id="blog-publish" data-id="{{ $blog['id'] }}"
												data-publish="{{ $blog['is_published'] == 1 ? 0 : 1 }}">{{ $blog['is_published'] == 1 ? "Publish" : "UnPublish" }}</a>
											</td>
											<td>
												<a href="{{ url('show-blog/'.$blog['id']) }}" class="btn btn-info btn-xs">Edit</a>
												<a href="#delete_blog_popup" data-toggle="modal" class="btn btn-xs btn-danger delete_single" data-id="{{ $blog['id'] }}">Delete</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table> -->
							</div>
							<form id="del_form" action="/delete-blog" method="POST">
				 				{{ csrf_field() }}
				 				<input id="hidden_del" type="hidden" name="hidden_del" value="">
				 			</form>
				 			<form id="multi_del_form" action="/multi-delete-blog" method="POST">
				 				{{ csrf_field() }}
				 				<input id="multi_hidden_del" type="hidden" name="hidden_del" value="">
				 			</form>
							<!-- /.card-body -->
							<!-- <div class="card-footer clearfix">
								<ul class="pagination pagination-sm m-0 float-right">
									<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
								</ul>
							</div> -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection

@section('additional_js')
<script type="text/javascript">

$(document).ready(function() {
	/*if ($('input[name="multi_delete[]"]:checkbox:checked').length == 0) {
			console.log('test');
		$('#multiple_delete').prop('disabled', true);
	}*/
	$('#blog_table').DataTable({
		"processing": true,
		"serverSide": true,
		"bFilter": false,
		// "bPaginate": false,
		"paging":true,
		// "pagingType": "full_numbers",
		"bInfo" : false,
		"ordering": false,
		"ajax": "{{ url('blog_data') }}",
		"columns":[
		{ "data": "check" },
		{ "data": "title" },
		// { "data": 'DT_RowIndex', name: 'DT_RowIndex',"sClass": "datatables_action"  }, -> for row numbering
		{ "data": "category" },
		{ "data": "created_at" },
		{ "data": "publish" },
		{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});

	$(document).on('click',".delete_single",function(event){
		var id = $(this).attr("data-id");
		$('#hidden_del').val(id);
		$('#myModal2').modal('show');
	});

	$(document).on('click',"#blog-publish",function(event){
		var id = $(this).attr("data-id");
		var value = $(this).attr("data-publish");
		$('#publish-id').val(id);
		$('#publish-value').val(value);
		$('#publish-modal').modal('show');
	});

	$(document).on('click',"#yes",function(event){
		$("#del_form").submit();
	});

	$("#checkAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});

	$(document).on("click", "#multiple_delete_button", function(e) {
		if ($('input[name="multi_delete[]"]:checkbox:checked').length == 0) {
			alert('Select atleast one checkbox');
		} else {
			$('#multiple_delete').modal('show');
			blogs = []
			$('.multi_del:checked').each(function() {
				blogs.push($(this).attr('data-id'));
			})
			$(".multi_id").val(JSON.stringify(blogs));
		}
	});

	$(document).on('click',"#yes",function(event){
		$("#del_form").submit();
	});

	$(document).on('click',"#done",function(event){
		$("#publish-form").submit();
	});

	$(document).on('click',"#sure",function(event){
		var id = $(".multi_id").val();
		$('#multi_hidden_del').val(id);
		$("#multi_del_form").submit();
	});
});

</script>
@endsection