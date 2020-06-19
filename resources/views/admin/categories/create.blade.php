@extends('layouts.dashboard')

@section('content')
<x-container>
	<x-back-button />
	<x-form :action="route('categories.store')" btnText='add.categories'>
		<x-input name="description" type="text" placeholder="description" />
	</x-form>
</x-container>
@endsection
