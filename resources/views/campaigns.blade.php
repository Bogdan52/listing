@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" >
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="~/scripts/jquery.dataTables.min.js"></script>  

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
		@endsection