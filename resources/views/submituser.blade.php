@extends('layouts.app')
@section('content')
		<div class="container">
				<div class="row">
						<h1>Add campaigns</h1>
				</div>
				<div class="row">
						<form action="/company/$id/campaigns/create" method="post">
								@csrf
								@if ($errors->any())
										<div class="alert alert-danger" role="alert">
												Please fix the following errors
										</div>
								@endif
								<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
										@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<div class="form-group">
										<label for="buget">Email</label>
										<input type="number" class="form-control @error('buget') is-invalid @enderror" id="buget" name="buget" placeholder="Buget" value="{{ old('buget') }}" min="0">
										@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				</div>
		</div>
@endsection