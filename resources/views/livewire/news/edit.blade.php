<form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="heading">Heading</label>
            <input type="text" id="heading" wire:model.live="heading" class="form-control">
            @error('heading') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="slug">Slug:/Url</label>
            <input type="text" id="slug" wire:model="slug" class="form-control">
            @error('slug') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="excerpt">Excerpt</label>
            <textarea id="excerpt" wire:model="excerpt" class="form-control"></textarea>
            @error('excerpt') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="content">Content</label>
            <textarea id="content" wire:model="content" class="form-control"></textarea>
            @error('content') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="category">Category</label>
            <select id="category" wire:model="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="file">Image</label>
            <input type="file" id="file" wire:model.live="file" class="form-control">
            @error('file') <span class="text-danger error">{{ $message }}</span> @enderror
            @if ($image)
                <img src="{{ asset('storage/' . $image) }}" width="100">
            @endif
        </div>

        <div>
            <label for="city">City</label>
            @livewire('city.autocomplete', ['event' => 'selectedCity', 'city_id' => $city_id])
            @error('city_id') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            {{ $news_id ? 'Update News' : 'Add News' }}
        </button>

</form>
