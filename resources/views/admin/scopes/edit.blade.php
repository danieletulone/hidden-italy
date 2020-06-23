@extends('layouts.dashboard')
@section('content')
	<x-container>
		<x-back-button />
		<form action="{{ route('scopes.update', ['scope' => $scope]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
            <div class="form-group">
				<label for="name">Name</label>
				<input name="name" type="text" class="form-control" value="{{ $scope->name }}">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<input name="description" type="text" class="form-control" value="{{ $scope->description }}">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" role="button">Update Scope</button>
				<a href="{{ route('scopes.index') }}" class="btn btn-secondary">Cancel</a>
			</div>
		</form>
	</x-container>
@endsection
