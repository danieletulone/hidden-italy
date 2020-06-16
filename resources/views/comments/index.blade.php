@extends('layouts.dashboard')
@section('content')
<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>User ID</th>
				<th>Monument ID</th>
				<th>Comment</th>
				<th class="Actions">Actions</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($comments as $comment)
			<tr>
				<td>{{ $comment->id }}</td>
				<td>{{ $comment->user_id }}</td>
				<td>{{ $comment->monument_id }}</td>
				<td>{{ $comment->content }}</td>
				<td class="actions">
		      <form action="{{ action('CommentController@destroy', ['comment' => $comment->id]) }}" method="POST">
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
			{{ $comments->links() }}
		</x-container>

</div>
@endsection
