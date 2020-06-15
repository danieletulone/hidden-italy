@extends('layouts.dashboard')
@section('content')
<x-container>
	<x-back-button />
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $category->description }}</dd>
	</dl>
</x-container>
@endsection
