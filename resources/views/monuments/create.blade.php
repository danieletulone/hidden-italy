@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.index') }}" role="button">Back to Monuments</a>
	<form action="{{ route('monuments.store') }}" method="POST">
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
			<input name="lat" type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="Lon">Lon</label>
			<input name="lon" type="text" class="form-control">
		</div>
		<div class="form-group">
			<select name="user_id" class="form-control" id="user_id" required>
				@foreach($users as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->users_id) && $id === $monument->user_id) ? 'selected' : ''}}>{{ $display }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<select name="image_id" class="form-control" id="image_id" required>
				@foreach($images as $id => $display)
				<option value="{{ $id }}" {{ (isset($monument->images_id) && $id === $monument->images_id) ? 'selected' : ''}}>{{ $display }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Add Monument</button>
		</div>
	</form>
</div>
@endsection