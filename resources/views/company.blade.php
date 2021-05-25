@extends('layouts.app')
@section('content')
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style2.css') }}" > 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
 
	@csrf
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">
function listUser(id){

$.ajax(
	{
		url: "{{route('user_list')}}", 
		data:{id:id},
		method: "GET",
		success: function(result){
					console.log(result.html);
					$("#test").html(result.html);
		}
	}
);
}




function updateItem() {
				$('#footer_action_button').text("Invite User");
				$('#footer_action_button').addClass('glyphicon-check');
				$('#footer_action_button').removeClass('glyphicon-trash');
				$('.actionBtn').addClass('btn-success');
				$('.actionBtn').removeClass('btn-danger');
				$('.actionBtn').addClass('invuser');
				$('.modal-title').text('Invite User');
				$('.deleteContent').hide();
				$('.form-horizontal').show();
				$('#myModal').modal('show');
		}



	$(document).ready(listUser('{{$company->id}}'));
	</script>

	<div class="container">
				<div class="row">
						<table class="container" >
							<th>
										<td><h3> Curent Company</h3>
											<table class="container"><tr><td class="lateralTBorder">
												<label>ID: {{$company->id}}</label>
												</td></tr>
												<tr><td class="lateralTBorder">
												<label>Name:  {{$company->name}}</label>
												</td></tr>
												<tr><td class="lateralTBorder">
												<label>Adress: {{$company->adres}}</label>
												</td></tr>
												<tr><td class="lateralTBorder">
												<label>Cui: {{$company->cui}}</label>
												</td></tr>
												<!-- <tr><td>
													<button class="button button1"  onclick="window.location='{{ url("/user/company/{$company->id}/campaigns") }}'">View Campaigns</button>
												</td></tr> -->
											</table>
									</td>
										<td ><h3>User List <button class="button button1"  onclick="updateItem()">Invite user</button></h3>  

											<table id="test" class='container'>
										</table>
									</td>
							</th>
						</table>
				</div>

		</div>
		
		
<br>
<div class="container" id="widthC">
<button class="button button1" onclick="window.location='{{route('company_campaigns',['id'=>$company->id])}}'" >View Campaigns</button>


</div><br><br>
 <div class="container">
				<button class="button button1"  onclick="window.location='{{ url("/user") }}'">Back</button>
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
								<label class="control-label col-sm-2" for="email">Email:</label>
								<div class="col-sm-10">
									<input type="text" name="email" id="e">
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
							$('.modal-footer').on('click', '.invuser', function() {
								
									$.ajax({
												 
												 url: "{{route('invite_create')}}",
												 method:"POST",
												 data: {
													email: $("#e").val(),
													cid:{{$company->id}}
												},
												headers: {
														'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
												 },	
												success: function(campaign) {
													console.log(invc);
													listUser('{{$company->id}}');
											}
								 });

							});
						</script>
					</div>
				</div>
			</div>
@endsection