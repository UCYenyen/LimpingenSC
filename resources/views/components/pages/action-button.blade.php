@php
$colorClasses = [
'blue' => 'bg-blue-600 hover:bg-blue-700 text-white',
'yellow' => 'bg-yellow-600 hover:bg-yellow-700 text-white',
'red' => 'bg-red-600 hover:bg-red-700 text-white',
'green' => 'bg-green-600 hover:bg-green-700 text-white',
];

$classes = $colorClasses[$color] ?? 'bg-blue-600 hover:bg-blue-700 text-white';
@endphp

<button type="submit"
    class="{{ $classes }} px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
    {{ $slot }}
</button>
