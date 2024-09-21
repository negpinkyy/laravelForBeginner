@props(['name'])

@error('name')
<p class="text-red-500 font-semibold text-sm mt-2"> {{$message}}</p>
@enderror
