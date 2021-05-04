@foreach($users as $us)
			<tr>
				<td class="spaceTD"><label>ID: </label> {{$us->id}} </td>
				<td class="spaceTD"><label>Name: </label> {{$us->name}} </td>
				<td class="spaceTD"><label>Name: </label> {{$us->email}} </td>
				<td class="spaceTD"></td>			
				<td ></td>				
			</tr>
@endforeach