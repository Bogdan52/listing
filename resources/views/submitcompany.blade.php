@extends('layouts.app')
@section('content')
		<div class="container">
				<div class="row">
						<h1>Add Company</h1>
				</div>
				<div class="row">
						<form action="/user/submit" method="post">
								@csrf
								@if ($errors->any())
										<div class="alert alert-danger" role="alert">
												Please fix the following errors
										</div>
								@endif
								<div class="form-group">
										<label for="name">Company Name</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
										@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<div class="form-group">
										<label for="cui">CUI</label>
										<input type="number" class="form-control @error('cui') is-invalid @enderror" id="cui" name="cui" placeholder="cui" value="{{ old('cui') }}" min="0">
										@error('cui')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<div class="form-group">
										<label for="adres">Adress</label>
										<input type="text" class="form-control @error('adres') is-invalid @enderror" id="adres" name="adres" placeholder="Adress" value="{{ old('adres') }}">
										@error('adres')
												<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				</div>
		</div>
@endsection