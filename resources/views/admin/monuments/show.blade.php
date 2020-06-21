@extends('layouts.dashboard')
@section('content')
<x-container>
    <x-back-button />

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
        
        <dt class="col-sm-3">Visible</dt>
        <dd class="col-sm-9">@if ( $monument->visible == 0) No @else Yes @endif</dd>
        
        <dt class="col-sm-3">Created at</dt>
        <dd class="col-sm-9">{{ $monument->created_at }}</dd>
       
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
                <img height="250" src="{{ Storage::url($item->url) }}" />
            @endforeach
        </dd>
    </dl>
</x-container>
@endsection
