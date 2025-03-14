@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-pink-700']) }}>
    {{ $value ?? $slot }}
</label>
