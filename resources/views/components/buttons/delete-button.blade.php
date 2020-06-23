@php $route = Str::plural($resource) . ".destroy"; @endphp
<x-form 
    method="DELETE"
    :action="route($route, [$resource => $istance['id']])" 
    btn-text="delete"
/>