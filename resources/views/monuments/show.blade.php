@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('monuments.index') }}" role="button">Back to Monuments</a>
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $monument->id }}</dd>
		<dt class="col-sm-3">Name</dt>
		<dd class="col-sm-9">{{ $monument->name }}</dd>
		<dt class="col-sm-3">Description</dt>
		<dd class="col-sm-9">{{ $monument->description }}</dd>
		<dt class="col-sm-3">Latitude</dt>
		<dd class="col-sm-9">{{ $monument->lat }}</dd>
		<dt class="col-sm-3">Lonitude</dt>
		<dd class="col-sm-9">{{ $monument->lon }}</dd>
		<dt class="col-sm-3">Creator</dt>
		<dd class="col-sm-9">{{ $monument->user["name"] }}</dd>
		<dt class="col-sm-3">Main Category</dt>
		<dd class="col-sm-9">{{ $monument->category->description }}</dd>
		<dt class="col-sm-3">Categories</dt>
		<dd class="col-sm-9">
			@foreach ($monument->categories as $category)
                <span class="badge badge-primary">{{ $category->description }}</span>
            @endforeach
		</dd>
		<dt class="col-sm-3">Image</dt>
		<dd>
            @foreach ($monument->images as $item)
            <img width="450px"src="{{ Storage::url($item->url) }}"/>
            @endforeach

		</dd>
	</dl>
</div>
@endsection
