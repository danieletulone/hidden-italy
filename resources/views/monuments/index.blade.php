@extends('layouts.dashboard')
@section('content')
<x-container>
	<a href="{{ route('monuments.create') }}" style="position:absolute;top:-25px;right:50px;width:50px;height:50px;" class="shadow-sm bg-success rounded-circle d-flex align-items-center justify-content-center">
		<img src="{{ asset('icons/add.png') }}" class="animated-icon rotate" width="25px" />
	</a>
	<div class="mt-5 form-inline mb-3">
	    <form class="form-inline mr-auto" action="{{ route('monuments.index') }}">
            <input class="form-control" type="search" placeholder="Search" name="search">
	    	<button type="submit" class="btn btn-primary ml-2">Cerca</button>
        </form>
    </div>
    <div>
        @if ($filter->name != "") Ordered by: <p class="badge badge-pill badge-primary"> @if ($filter->name == "ASC") A - Z @else Z - A @endif  <a href="{{ Request::path() }}" class="badge badge-pill badge-primary">X</a></p>
		@elseif ($filter->id != "") Ordered by: <p class="badge badge-pill badge-primary"> @if ($filter->id == "ASC") ↑ First @else ↓ Last @endif  <a href="{{ Request::path() }}" class="badge badge-pill badge-primary">X</a></p>
		@elseif ($filter->visible != "") Ordered by: <p class="badge badge-pill badge-primary">Visible @if ($filter->visible == "0") no @else yes @endif  <a href="{{ Request::path() }}" class="badge badge-pill badge-primary">X</a></p>
		@elseif ($filter->search != "") Ordered by: <p class="badge badge-pill badge-primary">{{$filter->search}}  <a href="{{ Request::path() }}" class="badge badge-pill badge-primary">X</a></p>
		@elseif ($filter->category_id != "")
			Ordered by: <p class="badge badge-pill badge-primary">
				@foreach($categories as $category)
					@if($category->id == $filter->category_id)
						{{ $category->description}}
					@endif
				@endforeach
		</p> <a href="{{ Request::path() }}" class="badge badge-pill badge-danger">X</a>
		@endif

    </div>
	<table class="table">
		<thead>
			<tr>
				<th class="dropdown">
					<a class=" dropdown nav-link dropdown-toggle" style="padding: 0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						ID
                    </a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
					<a href="{{ route('monuments.index', ['id' => "ASC"]) }}" class="dropdown-item">↑ First</a>
					<a href="{{ route('monuments.index', ['id' => "DESC"]) }}" class="dropdown-item">↓ Last</a>
					</div>
                </th>
				<th class="dropdown">
					<a class=" dropdown nav-link dropdown-toggle" style="padding: 0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Name
                    </a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a href="{{ route('monuments.index', ['name' => "ASC"]) }}" class="dropdown-item">A - Z</a>
						<a href="{{ route('monuments.index', ['name' => "DESC"]) }}" class="dropdown-item">Z - A</a>
					</div>
                </th>
				<th>Description</th>
				<th class="dropdown">
					<a class=" dropdown nav-link dropdown-toggle" style="padding: 0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Visible
                    </a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a href="{{ route('monuments.index', ['visible' => 0]) }}" class="dropdown-item">No</a>
						<a href="{{ route('monuments.index', ['visible' => 1]) }}" class="dropdown-item">Yes</a>
						<a href="{{ Request::path() }}" class="dropdown-item">All</a>
					</div>
                </th>
				<th class="dropdown">
					<a class=" dropdown nav-link dropdown-toggle" style="padding: 0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Main category
                    </a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						@forelse ($categories as $category)
							<a href="{{ route('monuments.index', ['category_id' => $category->id]) }}" class="dropdown-item"> {{ $category->description}} </a>
						@endforeach
						<a href="{{ Request::path() }}" class="dropdown-item">All</a>
					</div>
				</th>
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
                <td>
                    @if ($monument->visible == 0)
                    {{ 'no'}}
                    @else
					{{ 'yes' }}
                    @endif

				</td>
				{{-- <td>{{ $monument->lat }}</td>
				<td>{{ $monument->lon }}</td> --}}
                <td>{{ $monument->category->description }}</td>
                <td>
					@foreach ($monument->categories as $category)
						<span class="badge badge-pill badge-primary">{{ $category->description }}</span>
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
		</x-container>
</x-container>
@endsection
