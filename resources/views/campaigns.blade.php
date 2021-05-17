@extends('layouts.app')
@section('content')
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" >
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	@csrf
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!-- csv import -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- csv import -->
		
	<!-- date picker -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<!-- date picker -->
	<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

  <!--slider -->


<script>
	var val;
	var dir;
	var row;
	var states =[];
		function listCampaigns(sent_value,sent_direction,page,rows){
			val=sent_value;
			dir=sent_direction;
			row=rows;

			$.ajax(
			{
				url: "{{route('campaigns_list',['id'=>$id])}}?page="+page, 
				method: "GET",
				data:{
					value: sent_value ,
					direction: sent_direction,
					rows:rows,
					states:states,
				},
				success: function(result){
						console.log(result.html);
						$("#dataTable").html(result.htmlt);
						$("#test").html(result.html);
						reCheckCheckBox();
				}	
			}
			);
			
		}
		$(function()
		{
		 $('div').on('click', '.pagination a',function(event)
			{
				$('li').removeClass('active');
				$(this).parent('li').addClass('active');
				event.preventDefault();
				var myurl = $(this).attr('href');
				var page=$(this).attr('href').split('page=')[1];
				listCampaigns(val,dir,page,row);
			});
		});

	function deleteItem(id) {

		if (confirm("Are you sure?")) {
			 $.ajax(
			{
				url: "{{route('campaign_delete')}}", 
				data:{  
					 id: id , 
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},	
				method: "DELETE",
			success: function(result){
				listCampaigns(val,dir,1,row);
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

		function importCSV() {
				$('#footer_action_button_CSV').text("Submit CSV File");
				$('#footer_action_button_CSV').addClass('glyphicon-check');
				$('#footer_action_button_CSV').removeClass('glyphicon-trash');
				$('.actionBtn').addClass('btn-success');
				$('.actionBtn').removeClass('btn-danger');
				$('.actionBtn').addClass('impCSV');
				$('.modal-title').text('Select CSV File');
				$('.deleteContent').hide();
				$('.form-horizontal').show();
				$('#importModal').modal('show');
		}
		function exportCSV(id)
		{	
			$.ajax(
			{
				url: "{{route('file-export')}}", 
				method: "GET",
				data:{
					id:id,
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function(result){
					window.location.href ="{{route('file-export')}}?id={{$id}}";
					
				}
			}
			);

		}


		function setStates(val,filtre_check_box)
		{
			 var checked = $(filtre_check_box).prop("checked");
			if(checked)
			{
				states.push(val);
			}else{
			removeElement(states,val);
			}
			console.log(states);
		}


		function removeElement(array, elem) {
    	var index = array.indexOf(elem);
    	if (index > -1) {
     	   array.splice(index, 1);
    	}
		}
		function reCheckFilter()
		{
			for(i=0;i<states.length;i++)
			{
			$('#'+states[i]+'Ch').attr('checked','checked');

			}
		}


		function getMetrics(id, startDate, endDate){
			$.ajax(
			{
				url: "{{route('campaignmetrics_index')}}", 
				method: "GET",
				data:{
					id:id,
					startDate:startDate,
					endDate:endDate,
				},
				success: function(result){
					console.log(result.html);
					$("#dataTable").empty();
					$("#dataTable").html(result.html);
				}
			}
			);
		}
		function collhideShow(chBox,colTh,colTd)
		{
			 var checked = $(chBox).prop("checked");
    if(checked){
       $(colTh).show();
       $(colTd).show();
    } else {
       $(colTh).hide();
       $(colTd).hide();
    }
		}
		function reCheckCheckBox()
		{
		collhideShow('#statusCh','#statusCol','.status_CheckBox');
		collhideShow('#clickCh','#clickCol','.clicks_CheckBox');
		collhideShow('#viewsCh','#viewsCol','.views_CheckBox');
		collhideShow('#bugetCh','#bugetCol','.buget_CheckBox');
		}

	$(document).ready(listCampaigns('name','asc',1,10));
</script>

	<div class="container">
		<div class="column">
			<h2> Campaigns</h2>
		</div>
		
		<div class="column">
			
			<h3 align="right">
<div class="btn-group dropstart ">
	<button type="button" class="button3 testHover" id="selectColumm" data-toggle="dropdown" aria-haspopup="true">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
	<path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
</svg>
	</button>
 <div class="dropdown-menu">
		<a class="dropdown-item" onclick="">
			<div class="form-check">
	<input class="form-check-input" type="checkbox" id="statusCh" onchange="collhideShow('#statusCh','#statusCol','.status_CheckBox')" checked>
	<label class="form-check-label" >
		Status
	</label>
</div>
		</a>
		<a class="dropdown-item" onclick="">
			<div class="form-check">
	<input class="form-check-input" type="checkbox" id="clickCh" onchange="collhideShow('#clickCh','#clickCol','.clicks_CheckBox')" checked>
	<label class="form-check-label">
		Click
	</label>
</div>
		</a>
		<a class="dropdown-item" onclick="">
			<div class="form-check">
	<input class="form-check-input" type="checkbox" id="viewsCh" onchange="collhideShow('#viewsCh','#viewsCol','.views_CheckBox')" checked>
	<label class="form-check-label">
		Views
	</label>
</div>
		</a>
		<a class="dropdown-item" onclick="">
			<div class="form-check">
	<input class="form-check-input" type="checkbox" id="bugetCh" onchange="collhideShow('#bugetCh','#bugetCol','.buget_CheckBox')" checked>
	<label class="form-check-label">
		Buget
	</label>
</div>
		</a>
	</div> 
</div> <button class="button3 testHover"  onclick="exportCSV('{{$id}}')">
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg></button> <button class="button3 testHover"  onclick="importCSV()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg></button> <button class="button button1"  onclick="window.location='{{route('campaign_create',['id'=>$id])}}'">+Create Campaign</button></h3>
			
		</div>
		<div class="row">
			<div id="dataTable">
			</div>
		</div>
	</div>
<br><br><br><br>
	<div class="container">
		<button class="button button1" onclick="window.location='{{route('company_index',['id'=>$id])}}'">Back</button>
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
			</div>
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
							url: "{{route('campaign_update')}}",
							method:"POST",
							data: {
								//	_token: $('input[name=_token]').val(),
								id: $("#fid").val(),
								state: $('#s').val(),
							},
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},	
							success: function(campaign) {
								console.log(campaign);
								listCampaigns(val,dir,1,row);
							}
						});
				});
			</script>
		</div>
	</div>
</div>

<div id="importModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
				<button type="button" class="close" data-dismiss="modal" >&times;</button>	
			</div>
			<div class="modal-body">
				<form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
						@csrf
					 <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
							<div class="custom-file text-left">
								<input type="file" name="file"  id="customFile">    
							 </div>
					</div>     
					<button class="btn btn-primary" align="left">Import data</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection