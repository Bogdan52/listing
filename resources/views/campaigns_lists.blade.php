@foreach ($campaigns as $campaign)
 		<tr>
 			<td>{{$campaign->name}}</td>
 			<td>{{$campaign->state}}</td>
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
 		</tr>
@endforeach
<tr>
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
</tr>

 