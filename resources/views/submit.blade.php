@extends('layouts.app')
@section('content')
		<div class="container">
				<div class="row">
						<h1>Add campaigns</h1>
				</div>

				<div class="row">
						<form action="{{route('campaign_store',['id'=>$id])}}" method="post">
								@csrf
								@if ($errors->any())
										<div class="alert alert-danger" role="alert">
												Please fix the following errors
										</div>
								@endif
								<div class="form-group">
										<label for="name">Campaigns Name</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
										@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<div class="form-group">
										<label for="buget">Buget</label>
										<input type="number" class="form-control @error('buget') is-invalid @enderror" id="buget" name="buget" placeholder="Buget" value="{{ old('buget') }}" min="0">
										@error('buget')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<div class="form-group">
										<label for="start_date">Start Date:</label>
										<input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" placeholder="" value="{{ old('start_date') }}" min="0">
										@error('start_date')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
										<label for="end_date">End Date:</label>
										<input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" placeholder="" value="{{ old('end_date') }}" min="0">
										@error('edate')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<!-- <div class="form-group">
										<label for="cimage">Image:</label>
										<input type="file" id="cimage" name="cimage"  accept="image/*">
										@error('cimage')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div> -->
								<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				</div>
		</div>
@endsection