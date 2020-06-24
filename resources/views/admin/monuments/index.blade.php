@extends('layouts.dashboard')

@section('content')
	<x-container>
		<a href="{{ route('monuments.create') }}" style="position:absolute;top:-25px;right:50px;width:50px;height:50px;" class="shadow-sm bg-success rounded-circle d-flex align-items-center justify-content-center">
			<img src="{{ asset('icons/add.png') }}" class="animated-icon rotate" width="25px" />
		</a>

		<div class="form-inline mb-3">
			<form class="form-inline mr-auto" action="{{ route('monuments.index', array_merge(Request::all(), [])) }}">
				@foreach (Request::all() as $key => $value)
					<input name="{{ $key }}" type="hidden" value="{{ $value }}" />
				@endforeach

				<input class="form-control" type="search" placeholder="Search" name="search">
				<button type="submit" class="btn btn-primary ml-2">Cerca</button>
			</form>
		</div>

		<div class="mb-3">
			<span>
				Filtered by:
			</span>

			<x-filter-tag type="name">
				@if ($filter->name == "ASC")
					A - Z
				@else
					Z - A
				@endif
			</x-filter-tag>

			<x-filter-tag type="id">
				@if ($filter->id == "ASC") ↑ First @else ↓ Last @endif
			</x-filter-tag>

			<x-filter-tag type="visible">
				@if ($filter->visible == "0") no @else yes @endif
			</x-filter-tag>

			<x-filter-tag type="search">
				<span>{{$filter->search}}</span>
			</x-filter-tag>

			<x-filter-tag type="category_id">
				@foreach($categories as $category)
						@if($category->id == $filter->category_id)
							{{ $category->description}}
						@endif
					@endforeach
			</x-filter-tag>
		</div>

		<table class="table">
			<thead>
				<tr>
					<!-- DROPDOWN -->
					<x-filter-dropdown name="id">
						<x-filter-dropdown-item :params="['id' => 'ASC']" value="↑ First"/>
						<x-filter-dropdown-item :params="['id' => 'DESC']" value="↓ Last"/>
					</x-filter-dropdown>

					<!-- DROPDOWN -->
					<x-filter-dropdown name="Name">
						<x-filter-dropdown-item :params="['name' => 'ASC']" value="A - Z"/>
						<x-filter-dropdown-item :params="['name' => 'DESC']" value="Z - A"/>
					</x-filter-dropdown>

					<th>Description</th>

					<!-- DROPDOWN -->
					<x-filter-dropdown name="visible">
						<x-filter-dropdown-item :params="['visible' => 0]" value="No" />
						<x-filter-dropdown-item :params="['visible' => 1]" value="Yes" />
					</x-filter-dropdown>

					<!-- DROPDOWN -->
					<x-filter-dropdown name="Main category">
						@foreach ($categories as $category)
							<x-filter-dropdown-item :params="['category_id' => $category->id]" :value="$category->description" />
						@endforeach
					</x-filter-dropdown>

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

					<td>{{ $monument->category->description }}</td>

					<td>
						@foreach ($monument->categories as $category)
							<span class="badge badge-pill badge-primary">{{ $category->description }}</span>
						@endforeach
					</td>

					<td class="actions">
						<a href="{{ route('monuments.show', ['monument' => $monument]) }}" alt="View" title="View">View</a>
						<a href="{{ route('monuments.edit', ['monument' => $monument]) }}" alt="Edit" title="Edit">Edit</a>
						<x-form method="DELETE" :action="route('monuments.destroy', ['monument' => $monument->id])" btn-text="delete" />
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
