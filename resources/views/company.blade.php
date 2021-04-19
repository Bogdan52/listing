@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="{{ url('/css/style2.css') }}" > 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<div class="container">
				<div class="row">
						<table class="container" >
							<th>
										<td><h3> Curent Company</h3>
											<table class="container"><tr><td>
												<label>ID: {{$company->id}}</label>
												</td></tr>
												<tr><td>
												<label>Name: {{$company->name}}</label>
												</td></tr>
												<tr><td>
												<label>Adress: {{$company->adres}}</label>
												</td></tr>
												<tr><td>
												<label>Cui: {{$company->cui}}</label>
												</td></tr>
												<!-- <tr><td>
													<button class="button button1"  onclick="window.location='{{ url("/user/company/{$company->id}/campaigns") }}'">View Campaigns</button>
												</td></tr> -->
											</table>
									</td>
										<td><h3> User List</h3> 
											<table class="container">
												@foreach($users as $us)
												<tr>
													<td class="spaceTD"><label>ID: </label> {{$us->id}} </td>
													<td class="spaceTD"><label>Name: </label> {{$us->name}} </td>
													<td class="spaceTD"><label>Name: </label> {{$us->email}} </td>
													<td class="spaceTD">
													</td>
													
												</tr>
												@endforeach
										</table>
									</td>
							</th>
						</table>
				</div>

		</div>
		
		
<br>
<div class="container" id="widthC">
<button class="button button1" onclick="window.location='{{ url("/user/company/{$company->id}/campaigns") }}'" >Viwe Campaigns</button>


</div><br><br>
 <div class="container">
				<button class="button button1"  onclick="window.location='{{ url("/user") }}'">Back</button>
			</div> 
@endsection