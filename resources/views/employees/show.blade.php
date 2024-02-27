<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Employee: {{ $employee->first_name }} {{ $employee->last_name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center">
                    <!-- Employee Info -->
                    <div class="block max-w-full md:max-w-md">
                        <div class="pb-4">
                            <strong>First Name:</strong> {{ $employee->first_name }}
                        </div>
                        <div class="pb-4">
                            <strong>Last Name:</strong> {{ $employee->last_name }}
                        </div>
                        <div class="pb-4">
                            <strong>Email:</strong> {{ $employee->email }}
                        </div>
                        <div class="pb-4">
                            <strong>Phone:</strong> {{ $employee->phone }}
                        </div>
                        <div class="pb-4">
                            <strong>Company:</strong> {{ $employee->company->name }}
                        </div>
                    </div>

                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('employees.edit', $employee->id) }}"
                           class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>
                        <a href="{{ route('employees.index') }}"
                           class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Back to list
                        </a>

                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this employee?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
