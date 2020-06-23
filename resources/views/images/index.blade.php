@extends('layouts.app')

@section('content')
<div class="container">

	<a class="btn btn-primary mb-3" href="{{ route('images.create') }}" role="button">Add New Image</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th class="Actions">Actions</th>

			</tr>
		</thead>
		<tbody>
			@forelse ($images as $image)
			<tr>
				<td>{{ $image->id }}</td>
				<td>{{ $image->title }}</td>
				<td>{{ $image->description }}</td>
				<td> <img width="50px" src="@php echo \Illuminate\Support\Facades\Storage::url($image->url)@endphp" alt="{{ $image->title }}"></td>
				<td class="actions">
					<a href="{{ action('ImageController@show', ['image' => $image->id]) }}" alt="View" title="View">
					View
				</a>
				<a href="{{ action('ImageController@edit', ['image' => $image->id]) }}" alt="Edit" title="Edit">
				Edit
			</a>
			<form action="{{ action('ImageController@destroy', ['image' => $image->id]) }}" method="POST">
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
