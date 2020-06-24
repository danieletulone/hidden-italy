<x-sidebar-button :visible="$visible" name="logout" route="logout" icon="logout">
    @section('script')
        onclick="event.preventDefault();document.querySelector('#logout-form').submit();"
    @endsection
</x-sidebar-button>

<x-form id="logout-form" :action="route('logout')" style="display: none;" :show-button="false" />
