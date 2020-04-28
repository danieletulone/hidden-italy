@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.index') }}" role="button">Back to Monuments</a>
	<form action="{{ route('monuments.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="Name">Name</label>
			<input name="name" type="input" class="form-control" aria-describedby="Monument Name">
		</div>
		<div class="form-group">
			<label for="Description">Description</label>
			<input name="description" type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="Lat">Lat</label>
			<input name="lat" type="number" step="any" class="form-control">
		</div>
		<div class="form-group">
			<label for="Lon">Lon</label>
			<input name="lon" type="number" step="any" class="form-control">
		</div>
		<div class="form-group">
			<select name="user_id" class="form-control" id="user_id" required>
				@foreach($users as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->users_id) && $id === $monument->user_id) ? 'selected' : ''}}>{{ $display }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-grop">
			<div class="custom-file">
				<label class="custom-file-label" for="picture">Picture</label>
				<input name="url" type="file" class="custom-file-input" placeholder="Picture"/>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Add Monument</button>
		</div>
	</form>
</div>
@endsection
