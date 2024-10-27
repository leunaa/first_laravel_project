<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Create Job</x-slot:heading>
    
    <form action="/jobs" method="POST">
        @csrf
        <div class="w-1/2">
            
            <div class="my-2">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <input type="text" name="title" id="title" required class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Virtual Assistant">
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
                    <input type="text" name="salary" id="salary" required class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0.00">
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

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900 hover:text-red-500">Cancel</button>
                <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>

        </div>
    </form>

</x-layout>