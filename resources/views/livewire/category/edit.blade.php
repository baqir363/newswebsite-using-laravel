<div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" wire:model.live="name" class="form-control">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" wire:model="slug" class="form-control">
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Save" class="btn btn-primary btn-sm">
    </form>
</div>
