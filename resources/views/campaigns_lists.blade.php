@foreach ($campaigns as $campaign)

		<tr>
		<td  title="ID: {{$campaign->id}}">{{$campaign->name}}</td>
			<td id="stateChange" onclick="stateChange('{{$campaign->state}}','{{$campaign->id}}')">{{$campaign->state}}</td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<?php
			$click=$campaign->campaignMetric->sum('click');
			$views=$campaign->campaignMetric->sum('views');
			$spent=$campaign->campaignMetric->sum('spent');
			?>
			<td>{{$click}}</td>
			<td>{{$views}}</td>
			<td>{{$campaign->buget}}</td>
			<td>{{$spent}}</td>
			<td><button class="edit-modal button button1" onclick="updateItem('{{$campaign->id}}','{{$campaign->state}}')">Update</button></td>
			<td><button class="button button1" onclick="deleteItem('{{$campaign->id}}')">Delete</button></td>

		</tr>
@endforeach
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>
{!! $campaigns->links() !!}
</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
