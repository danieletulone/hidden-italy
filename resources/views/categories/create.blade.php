@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('categories.index') }}" role="button">Back to Categories</a>
	<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="description">Description</label>
			<input name="description" type="input" class="form-control" aria-describedby="Description Name">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary" role="button">Add Category</button>
		</div>
	</form>
</div>
@endsection
