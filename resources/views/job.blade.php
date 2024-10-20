<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job Details</x-slot:heading>

    <h1 class="font-bold">{{ $job['title']}}</h1>
    <p>This job pays {{ $job['salary']}} per year.</p>
</x-layout>