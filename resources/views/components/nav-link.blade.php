@php
/** @var string $href */

$active = request()->is($href);
@endphp
<a href="/{{ $href }}"
   class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md  px-3 py-2 text-base font-medium "
   aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
