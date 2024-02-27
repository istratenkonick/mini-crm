<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Company: {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="p-6 bg-white border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center">
                    <!-- Company Info -->
                    <div class="block max-w-full md:max-w-md">
                        <div class="pb-4">
                            @if($company->logo)
                                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} logo"
                                     class="w-32 h-32 object-cover rounded-full">
                            @else
                                <span
                                    class="inline-block w-32 h-32 bg-gray-200 text-gray-400 rounded-full overflow-hidden">
                                    No logo available
                                </span>
                            @endif
                        </div>
                        <div class="pb-4">
                            <strong>Name:</strong> {{ $company->name }}
                        </div>
                        <div class="pb-4">
                            <strong>Email:</strong> {{ $company->email }}
                        </div>
                        <div class="pb-4">
                            <strong>Website:</strong>
                            <a href="{{ $company->website }}" class="text-blue-500 hover:underline"
                               target="_blank">{{ $company->website }}</a>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('companies.edit', $company->id) }}"
                           class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>
                        <a href="{{ route('employees.create', ['company_id' => $company->id]) }}"
                           class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                           active="{{ request()->routeIs('employees.create') }}">
                            {{ __('Add New Employee') }}
                        </a>
                        <a href="{{ route('companies.index') }}"
                           class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Back to list
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Employees
                    </h3>
                    <div class="mt-4">
                        @if($company->employees->count() > 0)
                            <ul class="divide-y divide-gray-200">
                                @foreach ($company->employees as $employee)
                                    <li class="py-4 flex justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                            <p class="text-sm text-gray-500">{{ $employee->email }}</p>
                                            <p class="text-sm text-gray-500">{{ $employee->phone }}</p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('employees.show', $employee->id) }}"
                                               class="text-blue-600 hover:text-blue-900">View</a>
                                            <a href="{{ route('employees.edit', $employee->id) }}"
                                               class="text-blue-600 hover:text-blue-900">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500">No employees found for this company.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
