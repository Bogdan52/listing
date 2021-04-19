@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" > 
		<div class="container">
				<div class="row">
					<h3> Curent User</h3>
					<table id="">
						<tr>
							<td>
									<label>Name:  {{$users->name}} </label>
							</td>
							<td>
									<label>Email: {{$users->email}}	</label>
							</td>
							<td>
								
							</td>
						</tr>
					</table>
				</div>
				<div class="row">
						<tr>
							<td>
									<h1> Companies</h1>
									<table>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>CUI</th>
											<th>Adress</th>
											<th></th>
											<th></th>
											<th></th>
											<th>
												<th><button class="button button1"  onclick="window.location='{{ url("/user/submit") }}'">ADD</button></th><th>
											</th>
										</tr>
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
												<td><button class="button button2"  onclick="window.location='{{ url("/user/company/{$comp->id}") }}'">View</button></td>
												<td><button class="button button2"  onclick="window.location='{{ url("/user") }}'">Delete</button></td>
												<td>
												</td>

											</tr>
										@endforeach
									</table>
							</td>
						</tr>
						</table>
				</div>
		</div>
			
@endsection