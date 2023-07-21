@props(['active','auth'])

@php

switch ($auth) {
    case '生徒':

        $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-pastelblue-900 text-sm font-bold leading-5 text-gray-900 focus:outline-none focus:border-blue-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-bold leading-5 text-gray-500 hover:text-gray-700 hover:border-pastelblue-900 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

        break;

    case '指導員':

        $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-pastelpurple-500 text-sm font-bold leading-5 text-gray-900 focus:outline-none focus:border-purple-900 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-bold leading-5 text-gray-500 hover:text-gray-700 hover:border-pastelpurple-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

        break;

    default:
        
    $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-bold leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

        break;
}

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
