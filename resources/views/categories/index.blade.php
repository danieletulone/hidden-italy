@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('categories.create') }}" role="button">Add New Category</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Description</th>
				<th class="Actions">Actions</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->description }}</td>
				<td class="actions">
					<a
					href="{{ action('CategoryController@show', ['category' => $category->id]) }}"
					alt="View"
					title="View">
					View
				    </a>
				    <a
				    href="{{ action('CategoryController@edit', ['category' => $category->id]) }}"
				    alt="Edit"
				    title="Edit">
				    Edit
			        </a>
			        <form action="{{ action('CategoryController@destroy', ['category' => $category->id]) }}" method="POST">
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
