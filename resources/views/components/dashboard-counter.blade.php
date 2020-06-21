<div class="col-12 col-md-4 p-3">
    <a href="{{ route($name . '.index') }}" class="p-4 shadow rounded d-flex aling-items-center justify-content-center flex-column">
        <div class="text-center">
            <i class="material-icons" style="font-size:48px">{{ $icon }}</i>
        </div>

        <div class="text-center my-3">
            <small class="text-uppercase" style="font-size:8px">{{ $name }}</small>
        </div>

        <div class="text-center">
            <span class="p-2 rounded-pill px-4 bg-light">{{ $count }}</span>
        </div>
    </a>
</div>