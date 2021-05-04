@foreach($companies as $comp)
			<tr>
					<td>
						{{ $comp->id}}
					</td>
					<td>
						{{ $comp->name}}
					</td>
					<td>
						{{ $comp->cui}}
					</td>
					<td>
						{{ $comp->adres}}
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><button class="button button2"  onclick="window.location='{{ route('company_index',['id'=>$comp->id]) }}'">View</button></td>
					<td><button class="button button2"  onclick="deleteItem('{{$comp->id}}','{{ csrf_token() }}')">Delete</button></td>
					<td></td>
			</tr>
@endforeach
