@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" >
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="~/scripts/jquery.dataTables.min.js"></script>  
@csrf
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
var val;
var dir;
function listCampaigns(sent_value,sent_direction,page){
val=sent_value;
dir=sent_direction;
$.ajax(
	{
		url: "/company/{{$id}}/campaigns_list?page=" + page, 
		data:{ value: sent_value , direction: sent_direction },
		method: "GET",
		success: function(result){
					console.log(result.html);
					$("#test").html(result.html);
		}
	}
);
}
$(function()
{
		 $('tbody').on('click', '.pagination a',function(event)
		{
				$('li').removeClass('active');
				$(this).parent('li').addClass('active');
				event.preventDefault();
				var myurl = $(this).attr('href');
				var page=$(this).attr('href').split('page=')[1];
				listCampaigns(val,dir,page);
		});
});

function deleteItem(id,token) {

		if (confirm("Are you sure?")) {
			 $.ajax(
	{
		url: "/campaigns/delete/"+id+"/"+token, 
		data:{  
			 id: id , 
			_token: token,
		},
		method: "DELETE",
		success: function(result){
					listCampaigns(val,dir,1);
		}
		
	}
);
		return false;
}
}
function updateItem(id,state) {
				$('#footer_action_button').text("Update");
				$('#footer_action_button').addClass('glyphicon-check');
				$('#footer_action_button').removeClass('glyphicon-trash');
				$('.actionBtn').addClass('btn-success');
				$('.actionBtn').removeClass('btn-danger');
				$('.actionBtn').addClass('update');
				$('.modal-title').text('Update');
				$('.deleteContent').hide();
				$('.form-horizontal').show();
				$('#fid').val(id);
				$('#s').val(state);
				$('#myModal').modal('show');
		}



	$(document).ready(listCampaigns('name','asc',1));
</script>

		<div class="container">
				<div class="column">
						<h1> Campaigns</h1>
				</div>
				<div class="column">
						<h3 align="right"> <button class="button button1"  onclick="window.location='{{ url("/user/company/{$id}/campaigns/submit") }}'">ADD</button></h3>
				</div>
				<div class="row">
					<div>
						<table id="dataTable" class="display">
						<thead>
						<tr>
						<th id="thHover" onclick="listCampaigns('name','asc',1)">Name</th>
						<th id="thHover" onclick="listCampaigns('state','asc',1)">Status</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th id="thHover" onclick="listCampaigns('click','asc',1)">Click</th>
						<th id="thHover" onclick="listCampaigns('views','asc',1)">Views</th>
						<th id="thHover" onclick="listCampaigns('buget','asc',1)">Buget</th>
						<th id="thHover" onclick="listCampaigns('spent','asc',1)">Spent</th>
						<th></th>
						<th></th>
					

						</th>
						</thead>

						<tbody id="test">
						</tbody>
				</table>
						</div>
					</div>
				</div>
		 


				<br><br>
			<div class="container">
			<button class="button button1" onclick="window.location='{{ url("/user/company/{$id}") }}'">Back</button>
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
								<label class="control-label col-sm-2" for="id">ID:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="fid" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="state">State:</label>
								<div class="col-sm-10">
									<select id="s" class="stateDD form-select" name="state">
  									<option value="active">Active</option>
  									<option value="inactive">Inactive</option>
  									<option value="draft">Draft</option>
									</select>
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
							$('.modal-footer').on('click', '.update', function() {
								
									$.ajax({
											 	 
												 url: "/campaigns/update/"+ $("#fid").val()+"/"+$('#s').val(),
												 method:"POST",
												 data: {
													_token: $('input[name=_token]').val(),
													id: $("#fid").val(),
													state: $('#s').val(),
												},
											success: function(campaign) {
													console.log(campaign);
													 listCampaigns(val,dir,1);
											}
								 });
							});
						</script>
					</div>
				</div>
			</div>
		@endsection