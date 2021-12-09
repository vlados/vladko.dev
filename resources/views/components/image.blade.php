<picture>
    @if ($src_webp)
        <source srcset="{{ $src_webp }}" type="image/webp">
    @endif
        <source src="{{ $src }}" type="image/jpeg">
        <img src="{{ $src }}"  {{ $attributes->merge($defaultAttributes) }} loading="lazy">
</picture>
