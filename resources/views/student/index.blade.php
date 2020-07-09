<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="container mt-5">
		<button id="add-student-btn" class="btn btn-success btn-sm">Add new student</button>
		<div id="student-add-modal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Add new student</h3>
					</div>
					<div class="modal-body">
						<div class="app-alert"></div>
						<form id="student-add" action="" method="POST">
							@csrf
							<div class="form-group">
								<label for="">First Name</label>
								<input name="fname" id="fname" class="form-control" type="text">
							</div>
							<div class="form-group">
								<label for="">Last Name</label>
								<input name="lname" id="lname" class="form-control" type="text">
							</div>
							<div class="form-group">
								<label for=""></label>
								<input n class="btn btn-dark btn-sm" type="submit" value="Add">
							</div>
						</form>

					</div>
					<div class="modal-footer"></div>
				</div>
			</div>
		</div>
	</div>


	<div class="container mt-5 bg-light">
		<h2>All Students data</h2>

		<table id="student_table" class="table">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/datatables.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		(function($){
			$(document).ready(function(){

				// Show add student modal 
				$('button#add-student-btn').click(function(){
					$('#student-add-modal').modal('show');
				});

				// Student add form submit 
				$('form#student-add').submit(function(e){
					e.preventDefault();

					// Get form data 
					let fname = $('input#fname').val();
					let lname = $('input#lname').val();


					if( fname == '' || lname == '' ){
						$('.app-alert').html('<p class="alert alert-danger">All fields are required ! <button class="close" data-dismiss="alert">&times;</button></p>');
					}else {

						$.ajax({
							url : '{{ route('student.store') }}',
							method: "POST",
							data 	: new FormData(this),
							contentType : false,
							processData : false,
							success : function(data){
								$('.app-alert').html('<p class="alert alert-success">New student Added successfull ! <button class="close" data-dismiss="alert">&times;</button></p>');
								$('form#student-add')[0].reset();
								$('#student_table').DataTable().ajax.reload();

							}
						});
					}

				});


				$('#student_table').dataTable({
					processing : true,
					serverSide : true,
					ajax : {
						url : '{{ route('student.index') }}'
					},
					columns : [
						{
							data : 'fname',
							name : 'fname'
						},
						{
							data : 'lname',
							name : 'lname'
						},
						{
							data : 'action',
							name : 'action',
							orderable : false
						}
					]
				});


			});
		})(jQuery)
	</script>
</body>
</html>