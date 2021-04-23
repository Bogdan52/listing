@foreach ($campaigns as $campaign)

		<tr>
			<td>{{$campaign->name}}</td>
			<td id="stateChange" onclick="stateChange('{{$campaign->state}}','{{$campaign->id}}')">{{$campaign->state}}</td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td>{{$campaign->campaignData->click}}</td>
			<td>{{$campaign->campaignData->views}}</td>
			<td>{{$campaign->campaignData->buget}}</td>
			<td>{{$campaign->campaignData->spent}}</td>
			<td><button class="edit-modal button button1" onclick="updateItem('{{$campaign->id}}','{{$campaign->state}}')">Update</button></td>
			<td><button class="button button1" onclick="deleteItem(' {{$campaign->id}} ','{{ csrf_token() }}')">Delete</button></td>

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
	
</tr>
