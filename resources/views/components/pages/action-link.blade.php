@php
$colorClasses = [
    'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',
    'yellow' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
    'red' => 'bg-red-600 hover:bg-red-700 text-white',
    'green' => 'bg-green-500 hover:bg-green-600 text-white',
    'gray' => 'bg-gray-500 hover:bg-gray-600 text-white',
];

$classes = $colorClasses[$color] ?? 'bg-blue-500 hover:bg-blue-600 text-white';
@endphp

<a href="{{ $href }}"
    class="{{$classes}} px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
    {{ $slot }}
</a>
