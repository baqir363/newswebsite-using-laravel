<div>
    @if ($city)
        <div class="d-flex align-items-center">
            <span>{{ $city }}, {{ $state ?? 'N/A' }}, {{ $country ?? 'N/A' }}</span>
            <a wire:click="clear" class="btn btn-sm btn-outline-danger ms-2">
                <i class="fas fa-times"></i>
            </a>
        </div>
    @else
        <input type="text" wire:model.live="keyword" class="form-control mb-2" placeholder="Search city...">

        @if (!empty($results))
            <div class="border p-2">
                @foreach ($results as $row)
                    <a wire:click="select({{ $row->id }})" class="d-block mb-2">
                        {{ $row->name }}, {{ $row->state->name ?? 'N/A' }}, {{ $row->country->name ?? 'N/A' }}
                    </a>
                @endforeach
            </div>
        @endif
    @endif
</div>
