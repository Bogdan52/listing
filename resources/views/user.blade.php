@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" > 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
@csrf
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">

function listCompany(){

$.ajax(
	{
		url: "{{route('company_list')}}", 
		method: "GET",
		success: function(result){
					console.log(result.html);
					$("#test").html(result.html);
		}
	}
);
}

// $(function()
// {
// 		 $('tbody').on('click', '.pagination a',function(event)
// 		{
// 				$('li').removeClass('active');
// 				$(this).parent('li').addClass('active');
// 				event.preventDefault();
// 				var myurl = $(this).attr('href');
// 				var page=$(this).attr('href').split('page=')[1];
// 				listCompany('id','asc',page);
// 		});
// });
		

function deleteItem(id) {

		if (confirm("Are you sure?")) {
			 $.ajax(
	{
		url: "{{route('company_delete')}}", 
		data:{  
			 id:id, 
		},
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
		method: "DELETE",
		success: function(result){
					listCompany();
		}
		
	}
);
		return false;
}
}

function showInvites() {

				$('#footer_action_button').text("Invite User");
				$('#footer_action_button').addClass('glyphicon-check');
				$('#footer_action_button').removeClass('glyphicon-trash');
				$('.deleteContent').hide();
				$('.form-horizontal').show();
				$('#myModal').modal('show');
				$.ajax(
	{
		url: "{{route('invites_list')}}", 
		method: "GET",
		success: function(result){
					console.log(result.html);
					$("#ilist").html(result.html);
		}
	}
);
		}

function deleteInvite(id) {

			 $.ajax(
	{
		url: "{{route('invite_delete')}}", 
		data:{  
			 id:id, 
		},
		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
		method: "DELETE",
		success: function(result){
				
		}
		
	}
);

}



$(document).ready(listCompany());
	</script>
		<div class="container">
				<div class="row">
					<div class='container'>
					<h3> Curent User </h3>
				</div>
				<div class='container' align="right">
					<?php
						if(!$invites->isEmpty())
						{
					?>
					<button type="button" class="btn btn-danger" onclick="showInvites()">Invites</button>
					<?php
						}
					?>
				</div>
					<table id="">
						<tr>
							<td>
									<label>Name:  {{$users->name}} </label>
							</td>
							<td>
									<label>Email: {{$users->email}}	</label>
							</td>
							<td>
								
							</td>
						</tr>
					</table>
				</div>
				<div class="row">
						<tr>
							<td>
									<h1> Companies</h1>
									<table>
										<thead>
										<tr>
											<th >ID</th>
											<th >Name</th>
											<th >CUI</th>
											<th >Adress</th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th>
												<th><button class="button button1"  onclick="window.location='{{route('company_create')}}'">ADD</button></th><th>
											</th>
										</tr>
										</thead>
										<tbody id="test">
										</tbody>
									</table>
							</td>
						</tr>
						</table>
				</div>
		</div>
<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" role="form">
							
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">Invites:</label>
								<div class="col-sm-10">
									<table>
										<thead>
										<tr>
										<th>ID</th>
										<th>Name</th>
										<th></th>
										<th></th>
										</tr>
										</thead>
										<tbody id="ilist">
										</tbody>
									</table>
								</div>
							</div>
						</form>
						<div class="modal-footer">
							<button type="button" class="button1 btn actionBtn" data-dismiss="modal">
								<span id="footer_action_button" class='glyphicon'> </span>
							</button>
							<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class='glyphicon glyphicon-remove'></span> Close
							</button>
						</div>
						<script type="text/javascript">
							function inviteAccept(id){
								$.ajax(
									{
										url: "{{route('invite_accept')}}",
										method: "POST",
										data:{
												id:id,
										},
												headers: {
													'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
											},
								success: function(result){
											 deleteInvite(id);
									}
								}
								);
							}

						</script>
					</div>
				</div>
			</div>
@endsection