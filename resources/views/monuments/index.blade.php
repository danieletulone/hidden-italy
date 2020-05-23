@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.create') }}" role="button">Add New Monuments</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Lat</th>
				<th>Lon</th>
				<th>Main Category</th>
				<th>Others Categories</th>
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
                <td>{{ $monument->category->description }}</td>
                <td>
					@foreach ($monument->categories as $category)
						<span class="badge badge-primary">{{ $category->description }}</span>
					@endforeach
				</td>
				<td class="actions">
					<a
					href="{{ action('MonumentController@show', ['monument' => $monument->id]) }}"
					alt="View"
					title="View">
					View
				    </a>
				    <a
				    href="{{ action('MonumentController@edit', ['monument' => $monument->id]) }}"
				    alt="Edit"
				    title="Edit">
				    Edit
			        </a>
			        <form action="{{ action('MonumentController@destroy', ['monument' => $monument->id]) }}" method="POST">
				    @method('DELETE')
				    @csrf
				    <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
			        </form>
		        </td>
	        </tr>
	        @empty
	        @endforelse
        </tbody>
    </table>
</div>
@endsection
