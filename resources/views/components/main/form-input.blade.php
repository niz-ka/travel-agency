@props(["name","label","type","classList"])
<x-main._form-partial :name="$name" :label="$label">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $label }}" class="{{ $classList }}" {{ $attributes }}>
</x-main._form-partial>
