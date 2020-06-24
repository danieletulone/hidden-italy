@php $route = Str::plural($resource) . ".destroy"; @endphp
<x-form
    method="DELETE"
    :action="route($route, [$resource => $istance['id']])"
    btn-text="delete"
>
@section('delete-button')

<button type="submit" class="btn btn-danger btn-circle btn-sm p-1 mx-1" role="button">
    <small class="material-icons" style="font-size:18px">delete</small>
</button>

@endsection

</x-form>
