<div class="px-4 px-sm-0">
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="h5">
                {{ $title }}
            </h3>
            @if(isset($description))
            <p class="mt-1 text-muted">
                {{ $description }}
            </p>
            @endif
        </div>

        <div>
            {{ $aside ?? '' }}
        </div>
    </div>
</div>
