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
											<!-- <th>Category</th> -->
											<th>Created On</th>
											<th>Publish</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
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
		{ "data": "created_at" },
		{ "data": "publish" },
		{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		'columnDefs': [
			{
				"targets": 0,
				"className": "text-center",
			},
			{
				"targets": 3,
				"className": "text-center",
			}
		],
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
