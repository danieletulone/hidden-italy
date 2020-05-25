@extends('layouts.dashboard')
@section('content')
<div class="container">
	<a href="{{ route('categories.create') }}" style="position:absolute;top:-25px;right:50px;width:50px;height:50px;" class="shadow-sm bg-success rounded-circle d-flex align-items-center justify-content-center">
		<img src="{{ asset('icons/add.png') }}" class="animated-icon rotate" width="25px" />
	</a>
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
