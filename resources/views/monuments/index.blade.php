@extends('layouts.dashboard')
@section('content')
<x-container>
	<a href="{{ route('monuments.create') }}" style="position:absolute;top:-25px;right:50px;width:50px;height:50px;" class="shadow-sm bg-success rounded-circle d-flex align-items-center justify-content-center">
		<img src="{{ asset('icons/add.png') }}" class="animated-icon rotate" width="25px" />
	</a>

	<table class="table mt-5">
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
				<td>{{ Str::limit($monument->name, 20) }}</td>
				<td>{{ Str::limit($monument->description, 50) }}</td>
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
</x-container>
@endsection
