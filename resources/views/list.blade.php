@extends('layouts.app')
@section('content')
 
 <?php
use App\Campaigns;
use App\Data;
 ?>


 <style>

		th {
			padding: 10px;
			text-align: center;
			margin: 5px;
			font-size: 20px;
			border-bottom: 2px solid black;
			width: 100vh;
		}
		td {
			margin: 5px;
			text-align: center;
			font-size: 15px;
			border-bottom: 1px solid black;
		}
		.button1 {
			background-color: #008CBA; 
			color: black; 
			font-size: 15px;
			border: 2px solid #008CBA;
			border-radius: 12px;
		}

		.button:hover {
			background-color: white;
			color: black;
		}
		#ord{
			font-size: 15px;
			border-radius: 10px;
			background-color: white;
		}

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
 </style>
		<div class="container">
				<div class="row">
						<h1> Campaigns</h1>
				</div>
				<div class="row">
					<div>
						<table>
						<tr>
						<th>Name</th>
						<th>Status</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Click</th>
						<th>Views</th>
						<th>Buget</th>
						<th>Spent</th>
						<th></th>
						<th></th>
						<th><button class="button button1"  onclick="window.location='{{ url("/submit") }}'">ADD</button></th>
						<th>
							<form method="get" >
								<select name="order" id="ord" onchange='this.form.submit()'>
									<option value="" >Ordonare</option>
									<option value="id" >Id</option>
									<option value="buget">Buget</option>
								</select>
							</form>
						</th>
						</tr>
						<?php
						
						if(isset($_GET['order'])){
								$val=$_GET['order'];
						}
						else{	
								$val='id';
						}
						$camp_data= Data::select("*")
												->orderBy($val)
												->get();
						?>
						@foreach ($camp_data as $data)
						<?php
						$camp= Campaigns::find($data->campaign_id);
						?>
							 <tr>
							 <td>
								<?php
								echo $camp->name
								?>
							 </td>
								<td>
								<?php
								echo $camp->state
								?>
							 </td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td>
								<?php
								echo $data->click
								?>
							 </td>
								<td>
								<?php
								echo $data->views
								?>
							 </td>
							 <td>
								<?php
								echo $data->buget
								?>
							 </td>
								<td>
								<?php
								echo $data->spent
								?>
							 </td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 </tr>
						@endforeach

					</table>
					</div>
				</div>
		</div>
@endsection