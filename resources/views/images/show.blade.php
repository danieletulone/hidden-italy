@extends('layouts.app')

@section('content')
<div class="container">
	<a class="btn btn-primary mb-3" href="{{ route('images.index') }}" role="button">Back to Images</a>
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $image->id }}</dd>
		<dt class="col-sm-3">Title</dt>
		<dd class="col-sm-9">{{ $image->title }}</dd>
		<dt class="col-sm-3">Description</dt>
		<dd class="col-sm-9">{{ $image->description }}</dd>
		<dt class="col-sm-3">Image</dt>
		<dd> <img width="200px" src="@php echo \Illuminate\Support\Facades\Storage::url($image->url)@endphp" alt="{{ $image->title }}"></dd>
	</dl>
</div>
@endsection
