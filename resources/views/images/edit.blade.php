@extends('layouts.app')

@section('content')

<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('images.index') }}" role="button">Back to images</a>
	<form action="{{ route('images.update', ['image' => $image]) }}" method="POST"  enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="Name">Title: </label>
			<input name="title" type="text" class="form-control" value="{{ $image->title }}">
		</div>
		<div class="form-group">
			<label for="Address">Description: </label>
			<input name="description" type="text" class="form-control" value="{{ $image->description }}">
		</div>
		<div class="input-group">
			<label class="form-file-label pr-5">Choose Images: </label>
			<input name="url" type="file" class="form-file-input @error('url') is-invalid @enderror" value="{{ $image->url }}">
			@error('url')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group pt-3">
			<button type="submit" class="btn btn-primary" role="button">Edit Images</button>
		</div>
	</form>
</div>
@endsection
