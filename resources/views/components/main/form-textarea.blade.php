@props(["name","label","classList"])
<x-main._form-partial :name="$name" :label="$label">
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" placeholder="{{ $label }}" class="{{ $classList }}" {{ $attributes }}></textarea>
</x-main._form-partial>
