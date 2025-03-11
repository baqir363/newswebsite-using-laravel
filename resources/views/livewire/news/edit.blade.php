<div>
    <form wire:submit.prevent="save" method="POST">
        @csrf
        <div class="mb-3">
            <label for="heading">Heading</label>
            <input type="text" wire:model.defer="heading" class="form-control" id="heading">
            @error('heading')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="excerpt">Excerpt</label>
            <input type="text" wire:model.defer="excerpt" class="form-control" id="excerpt">
            @error('excerpt')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content">Content</label>
            <textarea wire:model.defer="content" class="form-control" id="content"></textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select wire:model.defer="category_id" class="form-control" id="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>
</div>
