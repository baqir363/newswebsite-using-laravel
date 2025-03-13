<div>
    @props(['key'])

    @error($key)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
