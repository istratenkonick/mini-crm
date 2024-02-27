<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome. I hope I understood the problem correctly and was able to solve it as simply as possible. Some points were simplified (phone validation, for example) in order not to spend a lot of time in choosing a more appropriate solution, so I chose the appropriate solution taking into account the description of the problem and my experience. Thank you.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
