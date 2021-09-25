<div>
    <label for="{{ $name }}" class="hidden">{{ $label }}</label>
    {{ $slot }}
    @error($name)
        <div class="text-red-500">{{ $message }}</div>
    @enderror
</div>
