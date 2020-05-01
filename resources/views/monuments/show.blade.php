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
		<dt class="col-sm-3">Image</dt>
		<dd>
			<!-- <img width="100px" height=100px src="{{ asset($monument->images[0]->image->url) }}"/>  -->
			<img width="100px" height=100px src="{{ asset($monument->image_id) }}"/>
			<img width="100px" height=100px src="@php echo \Illuminate\Support\Facades\Storage::url($monument->images[0]->image->url) @endphp"/>
		</dd>
	</dl>
</div>
@endsection
