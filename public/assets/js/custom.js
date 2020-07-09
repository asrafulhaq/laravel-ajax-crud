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
								alert(data);
							}
						});
					}

				});


			});
		})(jQuery)