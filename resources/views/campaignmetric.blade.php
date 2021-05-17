
	<div align="left">
		<h4>Campaign name: {{$campaign->name}}</h4>
	</div>
	<div  align="right">
		<label>Start:</label><input type="date" id="start" value='{{$startDate}}' >
		<label>End:</label><input type="date" id="end" value='{{$endDate}}'>
		<button class="button button1" onclick="getMetrics('{{$campaign->id}}',$('#start').val(),$('#end').val())">Apply</button>
	</div>

	<div class="container">
		<div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-secondary">
		<table class="display" id="campaignsTable">
			<tr>
				<th>Click</th>
				<th></th>
				<th>Views</th>
				<th></th>
				<th>Spent</th>
			</tr>
			@foreach($campaignmetrics as $cm)
			<tr>
				<td >{{$cm->click}}</td>
				<td></td>
				<td >{{$cm->views}}</td>
				<td></td>
				<td >{{$cm->spent}}</td>
			</tr>
			@endforeach
			<?php 
			if($campaignmetrics->count()<10)
			{
				for($i=$campaignmetrics->count()+1;$i<10;$i++)
				{
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php 
				}
			}
			 ?>

		</table>
	</div>
</div>
<br>
	<div align="right">
	<button class="button button1"  onclick="listCampaigns('name','asc',1,row)">Close</button>
	</div>
