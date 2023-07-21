@php
switch ($auth) {
    case '生徒':
        $class = 'block text-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:scale-125 font-bold focus:outline-none transition ease-in-out';
        break;
    case '指導員':
        $class = 'block text-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:scale-125 font-bold focus:outline-none transition ease-in-out';
        break;
    default:
        $class = 'block text-center w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:scale-125 font-bold focus:outline-none transition ease-in-out';
        break;
}
@endphp

<a class="{{ $class }}" {{ $attributes->merge() }}>{{ $slot }}</a>
