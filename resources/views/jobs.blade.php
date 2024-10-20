<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Listing</x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="hover:text-blue-500">
                <li>{{ $job['title']}}: Pays {{ $job['salary']}}</li>
            </a>
        @endforeach
    </ul>
</x-layout>