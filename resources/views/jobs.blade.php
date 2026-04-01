<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <div class="space-y-4">
    @foreach($jobs as $job)
            <a href="/jobs/{{$job['id']}}" class="text-gray-200 block px-4 py-6 border border-gray-400 rounded-lg">
                <div class="bold text-blue-300">{{ $job->employer->name }}</div>
                <div>
                    {{ $job['title'] }} - ${{ $job['salary'] }}/yr
                </div>
            </a>
    @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
