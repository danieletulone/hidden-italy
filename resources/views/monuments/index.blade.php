@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="#" role="button">Add New Monuments</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Lat</th>
				<th>Lon</th>
				<th>User ID</th>
				<th>Image ID</th>
				<th class="Actions">Actions</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($monuments as $monument)
			<tr>
				<td>{{ $monument->id }}</td>
				<td>{{ $monument->name }}</td>
				<td>{{ $monument->description }}</td>
				<td>{{ $monument->lat }}</td>
				<td>{{ $monument->lon }}</td>
				<td>{{ $monument->user_id }}</td>
				<td>{{ $monument->image_id }}</td>
				<td class="actions">
					<a
					href="#"
					alt="View"
					title="View">
					View
				</a>
				<a
				href="#"
				alt="Edit"
				title="Edit">
				Edit
			</a>
			<form action="#" method="POST">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
			</form>
		</td>
	</tr>
	@empty
	@endforelse
</div>
@endsection
