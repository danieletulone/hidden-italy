@extends('layouts.app')

@section('content')
<div class="container">

<a class="btn btn-primary mb-3" href="{{ route('users.create') }}" role="button">Add New Users</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nickname</th>
            <th>Name</th>
            <th>Surname</th>
						<th>Password</th>
						<th>Points</th>
						<th>Role ID</th>
						<th>Image ID</th>
            <th class="Actions">Actions</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nickname }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->surname }}</td>
								<td>{{ $user->password }}</td>
								<td>{{ $user->points }}</td>
								<td>{{ $user->role_id }}</td>
								<td>{{ $user->image_id }}</td>

                <td class="actions">
                    <a
                        href="{{ action('UserController@show', ['user' => $user->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ action('UserController@edit', ['user' => $user->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ action('UserController@destroy', ['user' => $user->id]) }}" method="POST">
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
