@extends('layouts.dashboard')
@section('content')
<x-container>
	<x-back-button />
	<form action="{{ route('categories.update', ['category' => $category]) }}" method="POST" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="Description">Description</label>
			<input name="description" type="text" class="form-control" value="{{ $category->description }}">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Update Category</button>
			<a href="{{ route('monuments.index') }}" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</x-container>
@endsection
