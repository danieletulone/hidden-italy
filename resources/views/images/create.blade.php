@extends('layouts.app')

@section('content')

<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('images.index') }}" role="button">Back to images</a>
	<form action="{{ route('images.store') }}" method="POST"  enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="Name">Title: </label>
			<input name="title" type="text" required class="form-control">
		</div>
		<div class="form-group">
			<label for="Address">Description: </label>
			<input name="description" type="text" required class="form-control">
		</div>
		<div class="input-group">
			<label class="form-file-label pr-5">Choose Images: </label>
			<input name="url" type="file" required class="form-file-input @error('url') is-invalid @enderror">
			@error('url')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group pt-3">
			<button type="submit" class="btn btn-primary" role="button">Add Images</button>
		</div>
	</form>
</div>

@endsection
