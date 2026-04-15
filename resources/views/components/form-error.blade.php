@props(['name'])
{{-- @error can check for a specific field validation error and makes a $message variable available inside it --}}
{{-- https://laravel.com/docs/13.x/validation#the-at-error-directive --}}
@error($name)
    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
@enderror
