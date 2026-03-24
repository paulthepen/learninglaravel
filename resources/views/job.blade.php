<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <h2>{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }}
    </p>
</x-layout>
