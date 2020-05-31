@extends('layouts.dashboard')
@section('content')
<x-container>
	<a href="{{ route('monuments.create') }}" style="position:absolute;top:-25px;right:50px;width:50px;height:50px;" class="shadow-sm bg-success rounded-circle d-flex align-items-center justify-content-center">
		<img src="{{ asset('icons/add.png') }}" class="animated-icon rotate" width="25px" />
	</a>
	<div class="mt-5">
		<form class="form-inline mr-auto" action="{{ route('monuments.index') }}">
      <input class="form-control" type="search" placeholder="Search" name="search">
			<button type="submit" class="btn btn-primary ml-2">Cerca</button>
    </form>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Lat</th>
				<th>Lon</th>
				<!-- <th>Main Category</th> -->
				<td class="dropdown">
					<a class=" dropdown nav-link dropdown-toggle" data-toggle="dropdown"
		aria-haspopup="true" aria-expanded="false">Main category</a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						@forelse ($categories as $category)
							<a href="{{ route('monuments.index', ['category_id' => $category->id]) }}" class="dropdown-item"> {{ $category->description}} </a>
						@endforeach
						<a href="{{ Request::path() }}" class="dropdown-item">Reset</a>
					</div>
				</td>
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
		<x-container>
			{{ $monuments->links() }}
			<x-container>
				Categorie:
				@forelse ($categories as $category)
					<a href="{{ route('monuments.index', ['category_id' => $category->id]) }}"> {{ $category->description}} </a> |
				@endforeach
				<a href="{{ Request::path() }}">Reset</a>
			</x-container>
		</x-container>
</x-container>
@endsection
