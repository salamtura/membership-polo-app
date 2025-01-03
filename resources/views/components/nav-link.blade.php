@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 dark:border-indigo-600 text-sm font-medium leading-5 text-[#A3D131] dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out underline underline-offset-[20px]'
            : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 dark:text-gray-400 hover:text-[#A3D131] dark:hover:text-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out hover:underline hover:underline-offset-[20px]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
