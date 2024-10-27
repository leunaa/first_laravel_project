<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
    
    <form action="/jobs/{{ $job->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="w-1/2">
            
            <div class="my-2">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                        value="{{ $job->title }}">
                </div>
            </div>

            @error('title')
                <p class="text-xs text-red-500"> {{ $message }} </p>
            @enderror

            <div class="my-2">
                <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input 
                        type="text" 
                        name="salary" 
                        id="salary" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                        value="{{ $job->salary }}">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="currency" name="currency" class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        <option>USD</option>
                        <option>CAD</option>
                        <option>EUR</option>
                        </select>
                    </div>
                </div>
            </div>

            @error('salary')
                <p class="text-xs text-red-500"> {{ $message }} </p>
            @enderror

            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div>
                    <button form="delete-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
                </div>

                <div class="flex items-center gap-x-6">
                    <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-red-500">Cancel</a>
                    <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>

        </div>
    </form>

    <form action="/jobs/{{ $job->id }}" id="delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>