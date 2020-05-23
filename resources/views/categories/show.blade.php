@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('categories.index') }}" role="button">Back to Categories</a>
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $category->description }}</dd>
	</dl>
</div>
@endsection
