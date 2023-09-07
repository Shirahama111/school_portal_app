@props(['active','auth'])

@php

switch ($auth) {
    case '生徒':

        $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-gray-700 text-base font-bold leading-5 text-gray-900 focus:outline-none focus:border-gray-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-base font-bold leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

        break;

    case '指導員':

        $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-gray-700 text-base font-bold leading-5 text-gray-900 focus:outline-none focus:border-gray-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-base font-bold leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

        break;

    default:
        
    $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-gray-700 text-base font-bold leading-5 text-gray-900 focus:outline-none focus:border-gray-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

        break;
}

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
