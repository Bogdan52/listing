<tr>
	<td  class="nameCol1" align="left">Results from {{$campaigns->count()}} campaigns</td>
	<td class="baseCol status_CheckBox"></td>
	<td class="baseCol clicks_CheckBox" id="sumclicks"></td>
	<td class="baseCol views_CheckBox" id="sumviews"></td>
	<td class="baseCol buget_CheckBox"></td>
	<td class="baseCol"></td>
	<td class="baseCol"></td>
</tr>
<?php 
$totalClicks=0; 
$totalViews=0; 
?>
<script type="text/javascript">
	$( ".nameCol" ).hover(
		function(){
				x=this.id;
				button=$( "<button type='button' style='float:right; font-size:14px;' class='button3 testHover'>View</button>");
				button.click( function(){ getMetrics(x,'2000-01-01','{{date("Y-m-d")}}');});
				$( this ).append( button );
		}, function(){
			$( this ).find( "button" ).last().remove();
		}
	);
</script>
@foreach ($campaigns as $campaign)
	<tr>
		<td  title="ID: {{$campaign->id}}" id="{{$campaign->id}}" class="nameCol">
			<div class="form-check" style="float:left;"><input class="form-check-input" type="checkbox" id="name{{$campaign->id}}" onchange="nameCheckList(this.id,'{{$campaign->id}}')">
				<label class="form-check-label" for="defaultCheck1">
				{{$campaign->name}}
				</label>
			</div>
		</td> 
		<td class="baseCol status_CheckBox" >
		<div align="right">{{$campaign->state}}
		<?php 
			if($campaign->state=="draft") 
			{
		?>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightgray" class="bi bi-circle-fill" viewBox="0 0 16 16">
				<circle cx="8" cy="8" r="8"/>
			</svg>

		<?php
			}
			else if($campaign->state=="inactive")
			{
		?>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-circle-fill" viewBox="0 0 16 16">
				<circle cx="8" cy="8" r="8"/>
			</svg>
		<?php
			}
			else
			{
		?>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightblue" class="bi bi-circle-fill" viewBox="0 0 16 16">
				<circle cx="8" cy="8" r="8"/>
		<?php
			}
		?>
		</div>
		</td>
		<?php
			$click=$campaign->campaignMetric->sum('click');
			$totalClicks+=$click;
			$views=$campaign->campaignMetric->sum('views');
			$totalViews+=$views;
			$spent=$campaign->campaignMetric->sum('spent');
		?>
		<td class="baseCol clicks_CheckBox">{{$click}}</td>
		<td class="baseCol views_CheckBox" >{{$views}}</td>
		<td class="bugetCol buget_CheckBox">
		<?php 
			$x=$spent/$campaign->buget;
		?>
		<script type="text/javascript">
			$(function(){
				if({{$spent}}>{{$campaign->buget}}){
					var element = document.getElementById("bar{{$campaign->id}}");
					element.classList.add("overspent");
				}
			});
		</script>
		<div class="progress " title="{{$spent}}/{{$campaign->buget}}">
			<div class="progress-bar" role="progressbar" aria-valuenow="{{$spent}}" aria-valuemin="0" aria-valuemax="{{$campaign->buget}}" style="width:{{$x*100}}%" id="bar{{$campaign->id}}">
			</div>
		</div>
		</td>
			<td class="baseCol"></td>
			<td class="baseCol">
				<button class="edit-modal button button1" onclick="updateItem('{{$campaign->id}}','{{$campaign->state}}')">Update
				</button>
			</td>
	</tr>
@endforeach
<script type="text/javascript">
	$("#sumclicks").html('{{$totalClicks}}');
	$("#sumviews").html('{{$totalViews}}');
</script>
	<?php 
		if($campaigns->count()<10)
		{
			for($i=$campaigns->count();$i<10;$i++)
			{
	?>
			<tr>				
				<td class="baseCol"></td>
				<td class="baseCol"></td>
				<td class="baseCol"></td>
				<td class="baseCol"></td>
				<td class="baseCol"></td>
				<td class="bugetCol"></td>
				<td class="baseCol"></td>
				<td class="baseCol"></td>
			</tr>
	<?php 
			}
		}
	?>
</tbody>